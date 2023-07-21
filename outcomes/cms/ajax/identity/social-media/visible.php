<?php

use Arshwell\Monolith\Web;

use Arshavinel\ElleTherapy\Validation\CMSValidation;
use Arshavinel\ElleTherapy\Table\SocialMedia;

$form = CMSValidation::run($_POST, array(
	'id' => array(
		"required|int",
		"inDB:Arshavinel\ElleTherapy\Table\SocialMedia,id_media"
	),
	'ftr' => array(
		'required|is_string|equal:0'
	)
));

if ($form->valid()) {
	$medias = SocialMedia::get($form->value('id'), "visible");

	$medias->visible = ($medias->visible == 1 ? 0 : 1);

	if ($medias->visible == 0
	&& SocialMedia::count("visible = 1 AND id_media != ?", array($form->value('id'))) == 0) {
		$form->message = array(
			'type' => "warning",
			'text' => "Fă întâi alte media-uri vizibile",
			'info' => "Mereu trebuie să existe un set, de media-uri, vizibil."
		);
	}
	else {
		$medias->edit();

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
					'url'   => Web::url('cms.ajax.identity.social-media.visible'),
					'type'  => 'POST'
				)
			)
		);

		if ($medias->visible) {
			$feature['HTML']['icon']  = 'eye';
			$feature['HTML']['class'] = "btn badge btn-outline-success p-2";

			$feature['JS']['tooltip']['title'] = 'Ascunde';
		}

		$form->html = Arshwell\Monolith\Module\HTML\Piece::feature($form->value('ftr'), $feature, $form->value('id'));
	}
}

echo $form->json();
