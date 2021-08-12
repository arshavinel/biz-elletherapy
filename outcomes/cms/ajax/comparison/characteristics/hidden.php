<?php

use Arsh\Core\Web;
use Brain\Validation\CMSValidation;
use Brain\Table\Industry\Characteristic;

$form = CMSValidation::run($_POST, array(
	'id' => array(
		"required|int",
		"inDB:Brain\Table\Industry\Characteristic,id_characteristic"
	),
	'ftr' => array(
		'required|int'
	)
));

if ($form->valid()) {
	$characteristic = Characteristic::get($form->value('id'), "hidden");

	$characteristic->hidden = ($characteristic->hidden == 1 ? 0 : 1);

	$characteristic->edit();

	$feature = array(
		'HTML' => array(
			'icon'  => 'arrow-alt-circle-up',
			'class' => "btn badge btn-outline-dark p-2",
			'type'  => 'submit'
		),
		'JS' => array(
			'tooltip' => array(
				'title'     => 'Listată',
				'placement' => 'top',
				'trigger'   => 'hover'
			),
			'ajax' => array(
				'url'   => Web::url('cms.ajax.comparison.characteristics.hidden'),
				'type'  => 'POST'
			)
		)
	);

	if ($characteristic->hidden) {
		$feature['HTML']['icon']  = 'arrow-alt-circle-down';
		$feature['HTML']['class'] = "btn badge btn-outline-secondary p-2";

		$feature['JS']['tooltip']['title'] = 'Ascunsă';
	}

	$form->html = Arsh\Core\Module\HTML\Piece::feature($form->value('ftr'), $feature, $form->value('id'));
}

echo $form->json();
