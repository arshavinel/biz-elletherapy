<?php

use Arshwell\Monolith\Meta;

use Arshavinel\ElleTherapy\Table\NLP\FAQ;
use Arshavinel\ElleTherapy\View\Site;

Meta::set('title',			Site::sentenceSEO('title'));
Meta::set('description',	Site::textSEO('description'));
Meta::set('keywords',		Site::sentenceSEO('keywords'));

Meta::set('og:title',               Site::sentenceSEO('SM:title'));
Meta::set('og:description',         Site::textSEO('SM:description'));
Meta::set('og:image',               Site::imageSEO('SM:image', 1200, 627));
Meta::set('twitter:title',          Site::sentenceSEO('SM:title'));
Meta::set('twitter:description',    Site::textSEO('SM:description'));
Meta::set('twitter:image',          Site::imageSEO('SM:image', 1200, 627));

$nlpFaqs = FAQ::select(array(
    'columns'   => "question:lg, answer:lg",
    'where'     => "visible = 1",
    'order'     => "`order` ASC, id_faq DESC"
));
