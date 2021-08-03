<?php

use App\Core\Web;
use App\Validations\CMSValidation;
use App\Tables\Service;

$form = CMSValidation::run($_POST, array(
	'id' => array(
		"required|int",
		"inDB:App\Tables\Service,id_service"
	),
	'ftr' => array(
		'required|int'
	)
));

if ($form->valid()) {
	$service = Service::get($form->value('id'), "visible");

	$service->visible = ($service->visible == 1 ? 0 : 1);

	$service->edit();

	$feature = array(
		'HTML' => array(
			'icon'  => 'lock',
			'class' => "btn badge btn-outline-secondary p-2",
			'type'  => 'submit'
		),
		'JS' => array(
			'tooltip' => array(
				'title'     => 'Fă-l vizibil',
				'placement' => 'top',
				'trigger'   => 'hover'
			),
			'ajax' => array(
				'url'   => Web::url('cms.ajax.service.visible'),
				'type'  => 'POST'
			)
		)
	);

	if ($service->visible) {
		$feature['HTML']['icon']  = 'eye';
		$feature['HTML']['class'] = "btn badge btn-outline-success p-2";

		$feature['JS']['tooltip']['title'] = 'Fă-l draft';
	}

	$form->html = App\Core\Module\HTML\Piece::feature($form->value('ftr'), $feature, $form->value('id'));
}

echo $form->json();
