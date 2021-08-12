<?php

use Arsh\Core\Web;
use Brain\Validation\CMSValidation;
use Brain\Table\NLP\FAQ;

$form = CMSValidation::run($_POST, array(
	'id' => array(
		"required|int",
		"inDB:Brain\Table\NLP\FAQ,id_faq"
	),
	'ftr' => array(
		'required|int'
	)
));

if ($form->valid()) {
	$faq = FAQ::get($form->value('id'), "visible");

	$faq->visible = ($faq->visible == 1 ? 0 : 1);

	$faq->edit();

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
				'url'   => Web::url('cms.ajax.faq.nlp.visible'),
				'type'  => 'POST'
			)
		)
	);

	if ($faq->visible) {
		$feature['HTML']['icon']  = 'eye';
		$feature['HTML']['class'] = "btn badge btn-outline-success p-2";

		$feature['JS']['tooltip']['title'] = 'Fă-l draft';
	}

	$form->html = Arsh\Core\Module\HTML\Piece::feature($form->value('ftr'), $feature, $form->value('id'));
}

echo $form->json();
