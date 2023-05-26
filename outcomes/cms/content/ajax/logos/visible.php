<?php

use Arshwell\Monolith\Web;

use Arshavinel\ElleTherapy\Validation\CMSValidation;
use Arshavinel\ElleTherapy\Table\Identity\Logo;

$form = CMSValidation::run($_POST, array(
	'id' => array(
		"required|int",
		"inDB:Arshavinel\ElleTherapy\Table\Identity\Logo,id_logo"
	),
	'ftr' => array(
		'required|is_string|equal:0'
	)
));

if ($form->valid()) {
	$logos = Logo::get($form->value('id'), "visible");

	$logos->visible = ($logos->visible == 1 ? 0 : 1);

	if ($logos->visible == 0
	&& Logo::count("visible = 1 AND id_logo != ?", array($form->value('id'))) == 0) {
		$form->message = array(
			'type' => "warning",
			'text' => "Fă întâi alte logo-uri vizibile",
			'info' => "Mereu trebuie să existe un set, de logo-uri, vizibil."
		);
	}
	else {
		$logos->edit();

		$feature = array(
			'HTML' => array(
				'icon'  => 'lock',
				'class' => "btn badge btn-outline-secondary p-2",
				'type'  => 'submit'
			),
			'JS' => array(
				'tooltip' => array(
					'title'     => 'Fă-le vizibile',
					'placement' => 'top',
					'trigger'   => 'hover'
				),
				'ajax' => array(
					'url'   => Web::url('cms.content.ajax.logos.visible'),
					'type'  => 'POST'
				)
			)
		);

		if ($logos->visible) {
			$feature['HTML']['icon']  = 'eye';
			$feature['HTML']['class'] = "btn badge btn-outline-success p-2";

			$feature['JS']['tooltip']['title'] = 'Ascunde';
		}

		$form->html = Arshwell\Monolith\Module\HTML\Piece::feature($form->value('ftr'), $feature, $form->value('id'));
	}
}

echo $form->json();
