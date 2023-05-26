<?php

use Arshwell\Monolith\Meta;

use Arshavinel\ElleTherapy\Table\Interesting;
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

$interestings = Interesting::select(array(
    'columns'   => "text:lg",
    'order'     => "`order` ASC, id_interesting DESC"
));
