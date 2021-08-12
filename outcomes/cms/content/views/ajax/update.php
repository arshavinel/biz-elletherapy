<?php

use Arsh\Core\File;
use Arsh\Core\Text;
use Brain\Validation\CMSValidation;
use Brain\Table\Meditator;
use Brain\View\Site;

if (!empty($_FILES)) {
	$_POST['data'] = array_replace_recursive($_POST['data'], File::reformat($_FILES['data'], 3));
}

$form = CMSValidation::run($_POST, array(
	'global' => array(
		"required|int|inArray:0,1"
	),
	'source'	=> array(
		"inDB:Brain\View\Site",
		function ($key, $value) {
			if (!self::error('global')) {
				if (!Site::count("source = ? AND global = ?", array($value, self::value('global')))) {
					return "Source and global don't match";
				}
			}
		}
	),
	'data' => array(
		"required|array", // key: data
		array(
			"required|array", // key: type
			array(
				"required|array", // key: info
				array(
					// "required", // key: lg
					function ($lg, $value) {
						if (!in_array($lg, (Site::TRANSLATOR)::LANGUAGES)) {
							return "Language needed";
						}
					}
				)
			),
			function ($type, $info, $values) {
				switch ($type) {
					case Site::TYPES['content']: {
						return array(
							function ($info, $lg, $value) {
								if (empty(trim(Text::removeAllTags($value)))) {
									// return self::message('required');
								}
							}
						);
					}
					case Site::TYPES['image']:
					case Site::TYPES['imageSEO']: {
						return array(
							array(
								// "required|image:". Site::class .',value'
								"image:". Site::class .',value'
							)
						);
					}
					case Site::TYPES['images']: {
						return array(
							array(
								// "required|images:". Site::class .',value'
								"images:". Site::class .',value'
							)
						);
					}
					case Site::TYPES['video']: {
						return array(
							array(
								// "required|video:". Site::class .',value'
								"video:". Site::class .',value'
							)
						);
					}
					case Site::TYPES['checked']: {
						return array(
							array(
								// "required|inArray:0,1"
								"inArray:0,1"
							)
						);
					}
					default: {
						// return array(
						// 	array(
						// 		"required"
						// 	)
						// );
					}
				}
			}
		)
	),
	'filetools' => array(
		"optional|array",
		"delete" => array(
			"optional|array",
			'data' => array(
				"required|array", // key: data
				array(
					"required|array", // key: type
					array(
						"required|array", // key: info
						array(
							"required", // key: lg
							function ($lg, $value) {
								if (!in_array($lg, (Site::TRANSLATOR)::LANGUAGES)) {
									return "Language needed";
								}
							}
						)
					),
					function ($type, $info, $values) {
						switch ($type) {
							case Site::TYPES['image']:
							case Site::TYPES['imageSEO']: {
								return array(
									"required|array",
									array(
										"required|equal:1"
									)
								);
								break;
							}
							case Site::TYPES['images']: {
								return array(
									"required|array",
									array(
										"required|array",
										array(
											"required|equal:1",
										)
									)
								);
								break;
							}
						}
					}
				)
			)
		),
		"rename" => array(
			"optional|array",
			'data' => array(
				"required|array", // key: data
				array(
					"required|array", // key: type
					array(
						"required|array", // key: info
						array(
							"required", // key: lg
							function ($lg, $value) {
								if (!in_array($lg, (Site::TRANSLATOR)::LANGUAGES)) {
									return "Language needed";
								}
							}
						)
					),
					function ($type, $info, $values) {
						switch ($type) {
							case Site::TYPES['image']:
							case Site::TYPES['imageSEO']: {
								return array(
									"required|array",
									array(
										"required",
										function ($filename) {
											return basename(Text::slug($filename));
										}
									)
								);
								break;
							}
							case Site::TYPES['images']: {
								if (!self::error('source') && !self::value("data.$type.$info.$lg")) {
									$count = count((new Arsh\Core\Table\Files\ImageGroup(
										Site::class,
										Site::field(
											Site::PRIMARY_KEY,
											"source = ? AND type = ? AND info = ?",
											array(self::value('source'), $type, $info)
										),
										'value'
									))->smallest($lg));

									return array(
										"required|array",
										array(
											"required|array",
											array(
												"required",
												function ($filename) {
													return basename(Text::slug($filename));
												}
											)
										)
									);
								}
								break;
							}
						}
					}
				)
			)
		)
	)
));

if ($form->valid()) {
	foreach ($form->array('filetools.delete.data') as $type => $infos) {
		foreach ($infos as $info => $values) {
			foreach ($values as $lg => $value) {
				switch ($type) {
					case Site::TYPES['image']:
					case Site::TYPES['imageSEO']: {
						(new Arsh\Core\Table\Files\Image(
							Site::class,
							Site::field(
								Site::PRIMARY_KEY,
								"source = ? AND global = ? AND type = ? AND info = ?",
								array($form->value('source'), $form->value('global'), $type, $info)
							),
							'value'
						))->delete($lg);
						break;
					}
					case Site::TYPES['images']: {
						(new Arsh\Core\Table\Files\ImageGroup(
							Site::class,
							Site::field(
								Site::PRIMARY_KEY,
								"source = ? AND global = ? AND type = ? AND info = ?",
								array($form->value('source'), $form->value('global'), $type, $info)
							),
							'value'
						))->delete(array_flip($value), $lg);
						break;
					}
				}
			}
		}
	}

	foreach ($form->array('filetools.rename.data') as $type => $infos) {
		foreach ($infos as $info => $values) {
			foreach ($values as $lg => $value) {
				switch ($type) {
					case Site::TYPES['image']:
					case Site::TYPES['imageSEO']: {
						(new Arsh\Core\Table\Files\Image(
							Site::class,
							Site::field(
								Site::PRIMARY_KEY,
								"source = ? AND global = ? AND type = ? AND info = ?",
								array($form->value('source'), $form->value('global'), $type, $info)
							),
							'value'
						))->rename($value, $lg);
						break;
					}
					case Site::TYPES['images']: {
						(new Arsh\Core\Table\Files\ImageGroup(
							Site::class,
							Site::field(
								Site::PRIMARY_KEY,
								"source = ? AND global = ? AND type = ? AND info = ?",
								array($form->value('source'), $form->value('global'), $type, $info)
							),
							'value'
						))->rename($value, $lg);
						break;
					}
					case Site::TYPES['video']: {
						(new Arsh\Core\Table\Files\Doc(
							Site::class,
							Site::field(
								Site::PRIMARY_KEY,
								"source = ? AND global = ? AND type = ? AND info = ?",
								array($form->value('source'), $form->value('global'), $type, $info)
							),
							'value'
						))->rename($value, $lg);
						break;
					}
				}
			}
		}
	}

	foreach ($form->array('data') as $type => $infos) {
		foreach ($infos as $info => $values) {
			foreach ($values as $lg => $value) {
				switch ($type) {
					case Site::TYPES['image']:
					case Site::TYPES['imageSEO']: {
						(new Arsh\Core\Table\Files\Image(
							Site::class,
							Site::field(
								Site::PRIMARY_KEY,
								"source = ? AND global = ? AND type = ? AND info = ?",
								array($form->value('source'), $form->value('global'), $type, $info)
							),
							'value'
						))->update($value, $lg);

						Site::update(
							array(
								'set'	=> "updated_at = UNIX_TIMESTAMP()",
								'where'	=> "source = ? AND global = ? AND type = ? AND info = ?"
							),
							array($form->value('source'), $form->value('global'), $type, $info)
						);
						break;
					}
					case Site::TYPES['images']: {
						(new Arsh\Core\Table\Files\ImageGroup(
							Site::class,
							Site::field(
								Site::PRIMARY_KEY,
								"source = ? AND global = ? AND type = ? AND info = ?",
								array($form->value('source'), $form->value('global'), $type, $info)
							),
							'value'
						))->insert($value, $lg);

						Site::update(
							array(
								'set'	=> "updated_at = UNIX_TIMESTAMP()",
								'where'	=> "source = ? AND global = ? AND type = ? AND info = ?"
							),
							array($form->value('source'), $form->value('global'), $type, $info)
						);
						break;
					}
					case Site::TYPES['video']: {
						(new Arsh\Core\Table\Files\Doc(
							Site::class,
							Site::field(
								Site::PRIMARY_KEY,
								"source = ? AND global = ? AND type = ? AND info = ?",
								array($form->value('source'), $form->value('global'), $type, $info)
							),
							'value'
						))->update($value, $lg);

						Site::update(
							array(
								'set'	=> "updated_at = UNIX_TIMESTAMP()",
								'where'	=> "source = ? AND global = ? AND type = ? AND info = ?"
							),
							array($form->value('source'), $form->value('global'), $type, $info)
						);
						break;
					}
					default: {
						Site::update(
							array(
								'set'	=> "value:lg, updated_at = UNIX_TIMESTAMP()",
								'where'	=> "source = ? AND global = ? AND type = ? AND info = ?"
							),
							array(':lg' => $lg, $value, $form->value('source'), $form->value('global'), $type, $info)
						);
						break;
					}
				}
			}
		}
	}

	$form->message = array(
		'type' => "success",
		'text' => "Editat cu succes"
	);

    $form->forget($form->value('source'));
}
else {
	$form->message = array(
		'type' => "danger",
		'text' => "Câmpuri completate greșit"
	);

    $form->remember(true, $form->value('source'));
}

echo $form->json();
