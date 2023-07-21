<?php

use Arshwell\Monolith\Table\TableView;
use Arshwell\Monolith\File;
use Arshwell\Monolith\Text;

use Arshavinel\ElleTherapy\Validation\CMSValidation;

$classValidation = CMSValidation::run($_POST,
    array(
        'class' => array(
            "required|is_string",
            function ($key, $value) {
                if (!class_exists($value) || !is_subclass_of($value, TableView::class)) {
                    return "Invalid class (not a subclass of TableView)";
                }
            }
        )
    ),
    array(
        'is_string' => "Field 'class' should be a string"
    )
);

if ($classValidation->invalid()) {
    echo $classValidation->json();
    exit;
}

/** @var TableView */
$class = $classValidation->value('class');

if (!empty($_FILES)) {
	$_POST['data'] = array_replace_recursive($_POST['data'], File::reformat($_FILES['data'], 3));
}

$form = CMSValidation::run($_POST, array(
	'global' => array(
		"required|int|inArray:0,1"
	),
	'source' => array(
		"inDB:$class",
		function ($key, $value) use ($class) {
			if (!self::error('global')) {
				if (!($class)::count("source = ? AND global = ?", array($value, self::value('global')))) {
					return "Source and global state don't match";
				}
			}
		}
	),
	'data' => array(
        /**
         * 'data' is optional because could be send only 'filetools' request.
         */
		"optional|array", // key: data

		array(
			"required|array", // key: type
			array(
				"required|array", // key: info
				array(
					// key: lg
					function ($lg, $value) use ($class) {
						if (!in_array($lg, (($class)::TRANSLATOR)::LANGUAGES)) {
							return "Language needed";
						}
					}
				)
			),
			function ($type, $info, $values) use ($class) {
                /**
                 * Depending on the view type, validate the input.
                 *
                 * Note: all views are optional.
                 */
				switch ($type) {
					case ($class)::TYPES['image']: {
                        return array(
							array(
								"image:{$class},value"
							)
						);
                    }
					case ($class)::TYPES['imageSEO']: {
						return array(
							array(
								'maxBytes:300000', // max 300 KB (in decimal) or 292.96875 KB (in binary)
								"image:{$class},value"
							)
						);
					}
					case ($class)::TYPES['images']: {
						return array(
							array(
								"images:{$class},value"
							)
						);
					}
					case ($class)::TYPES['video']: {
						return array(
							array(
								"video:{$class},value"
							)
						);
					}
					case ($class)::TYPES['checked']: {
						return array(
							array(
								"inArray:0,1"
							)
						);
					}
                    case ($class)::TYPES['href']: {
						return array(
							array(
								"url"
							)
						);
					}
				}
			}
		)
	),
	'filetools' => array(
        /**
         * 'filetools' is optional because could be send only 'data' request.
         */
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
							function ($lg, $value) use ($class) {
								if (!in_array($lg, (($class)::TRANSLATOR)::LANGUAGES)) {
									return "Language needed";
								}
							}
						)
					),
					function ($type, $info, $values) use ($class) {
						switch ($type) {
							case ($class)::TYPES['image']:
							case ($class)::TYPES['imageSEO']: {
								return array(
									"required|array",
									array(
										"required|equal:1"
									)
								);
								break;
							}
							case ($class)::TYPES['images']: {
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
							function ($lg, $value) use ($class) {
								if (!in_array($lg, (($class)::TRANSLATOR)::LANGUAGES)) {
									return "Language needed";
								}
							}
						)
					),
					function ($type, $info, $values) use ($class) {
                        switch ($type) {
							case ($class)::TYPES['image']:
							case ($class)::TYPES['imageSEO']: {
								return array(
									"required|array", // key: lg
									array(
										"required",
										function ($filename) {
											return basename(Text::slug($filename));
										}
									)
								);
								break;
							}
							case ($class)::TYPES['images']: {
                                return array(
                                    "required|array", // key: lg
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
					case ($class)::TYPES['image']:
					case ($class)::TYPES['imageSEO']: {
						(new Arshwell\Monolith\Table\Files\Image(
							$class,
							($class)::field(
								($class)::PRIMARY_KEY,
								"source = ? AND global = ? AND type = ? AND info = ?",
								array($form->value('source'), $form->value('global'), $type, $info)
							),
							'value'
						))->delete($lg, false);
						break;
					}
					case ($class)::TYPES['images']: {
                        (new Arshwell\Monolith\Table\Files\ImageGroup(
							$class,
							($class)::field(
								($class)::PRIMARY_KEY,
								"source = ? AND global = ? AND type = ? AND info = ?",
								array($form->value('source'), $form->value('global'), $type, $info)
							),
							'value'
						))->delete(array_flip($value), $lg, false);
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
					case ($class)::TYPES['image']:
					case ($class)::TYPES['imageSEO']: {
						(new Arshwell\Monolith\Table\Files\Image(
							$class,
							($class)::field(
								($class)::PRIMARY_KEY,
								"source = ? AND global = ? AND type = ? AND info = ?",
								array($form->value('source'), $form->value('global'), $type, $info)
							),
							'value'
						))->rename($value, $lg);
						break;
					}
					case ($class)::TYPES['images']: {
						(new Arshwell\Monolith\Table\Files\ImageGroup(
							$class,
							($class)::field(
								($class)::PRIMARY_KEY,
								"source = ? AND global = ? AND type = ? AND info = ?",
								array($form->value('source'), $form->value('global'), $type, $info)
							),
							'value'
						))->rename($value, $lg);
						break;
					}
					case ($class)::TYPES['video']: {
						(new Arshwell\Monolith\Table\Files\Doc(
							$class,
							($class)::field(
								($class)::PRIMARY_KEY,
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
					case ($class)::TYPES['image']:
					case ($class)::TYPES['imageSEO']: {
						(new Arshwell\Monolith\Table\Files\Image(
							$class,
							($class)::field(
								($class)::PRIMARY_KEY,
								"source = ? AND global = ? AND type = ? AND info = ?",
								array($form->value('source'), $form->value('global'), $type, $info)
							),
							'value'
						))->update($value, $lg);

						($class)::update(
							array(
								'set'	=> "updated_at = UNIX_TIMESTAMP()",
								'where'	=> "source = ? AND global = ? AND type = ? AND info = ?"
							),
							array($form->value('source'), $form->value('global'), $type, $info)
						);
						break;
					}
					case ($class)::TYPES['images']: {
						(new Arshwell\Monolith\Table\Files\ImageGroup(
							$class,
							($class)::field(
								($class)::PRIMARY_KEY,
								"source = ? AND global = ? AND type = ? AND info = ?",
								array($form->value('source'), $form->value('global'), $type, $info)
							),
							'value'
						))->insert($value, $lg);

						($class)::update(
							array(
								'set'	=> "updated_at = UNIX_TIMESTAMP()",
								'where'	=> "source = ? AND global = ? AND type = ? AND info = ?"
							),
							array($form->value('source'), $form->value('global'), $type, $info)
						);
						break;
					}
					case ($class)::TYPES['video']: {
						(new Arshwell\Monolith\Table\Files\Doc(
							$class,
							($class)::field(
								($class)::PRIMARY_KEY,
								"source = ? AND global = ? AND type = ? AND info = ?",
								array($form->value('source'), $form->value('global'), $type, $info)
							),
							'value'
						))->update($value, $lg);

						($class)::update(
							array(
								'set'	=> "updated_at = UNIX_TIMESTAMP()",
								'where'	=> "source = ? AND global = ? AND type = ? AND info = ?"
							),
							array($form->value('source'), $form->value('global'), $type, $info)
						);
						break;
					}
					default: {
						($class)::update(
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
