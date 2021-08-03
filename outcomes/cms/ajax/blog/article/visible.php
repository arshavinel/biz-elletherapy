<?php

use App\Core\Web;
use App\Validations\CMSValidation;
use App\Tables\Article;

$form = CMSValidation::run($_POST, array(
	'id' => array(
		"required|int",
		"inDB:App\Tables\Article,id_article"
	),
	'ftr' => array(
		'required|int'
	)
));

if ($form->valid()) {
	$article = Article::get($form->value('id'), "visible");

	$article->visible = ($article->visible == 1 ? 0 : 1);

	$article->edit();

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
				'url'   => Web::url('cms.ajax.blog.article.visible'),
				'type'  => 'POST'
			)
		)
	);

	if ($article->visible) {
		$feature['HTML']['icon']  = 'eye';
		$feature['HTML']['class'] = "btn badge btn-outline-success p-2";

		$feature['JS']['tooltip']['title'] = 'Fă-l draft';
	}

	$form->html = App\Core\Module\HTML\Piece::feature($form->value('ftr'), $feature, $form->value('id'));
}

echo $form->json();
