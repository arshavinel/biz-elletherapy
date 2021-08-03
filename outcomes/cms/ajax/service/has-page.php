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
	$service = Service::get($form->value('id'), "has_page");

	$service->has_page = ($service->has_page == 1 ? 0 : 1);

	$service->edit();

	$feature = array(
		'HTML' => array(
			'icon'  => 'folder-minus',
			'class' => "btn badge btn-outline-secondary p-2",
			'type'  => 'submit'
		),
		'JS' => array(
			'tooltip' => array(
				'title'     => 'Fă-i pagină',
				'placement' => 'top',
				'trigger'   => 'hover'
			),
			'ajax' => array(
				'url'   => Web::url('cms.ajax.service.has-page'),
				'type'  => 'POST'
			)
		)
	);

	if ($service->has_page) {
		$feature['HTML']['icon']  = 'folder-open';
		$feature['HTML']['class'] = "btn badge btn-outline-dark p-2";

		$feature['JS']['tooltip']['title'] = 'Elimină pagina';
	}

	$form->html = App\Core\Module\HTML\Piece::feature($form->value('ftr'), $feature, $form->value('id'));
}

echo $form->json();
