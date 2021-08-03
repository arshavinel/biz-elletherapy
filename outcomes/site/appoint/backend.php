<?php

use App\Core\Meta;
use App\Validations\SiteValidation;
use App\Tables\SocialMedia;
use App\Views\Site;
use App\Tables\Service;

Meta::set('title',			Site::sentenceSEO('title'));
Meta::set('description',	Site::textSEO('description'));
Meta::set('keywords',		Site::sentenceSEO('keywords'));

Meta::set('og:title',               Site::sentenceSEO('SM:title'));
Meta::set('og:description',         Site::textSEO('SM:description'));
Meta::set('og:image',               Site::imageSEO('SM:image', 1200, 627));
Meta::set('twitter:title',          Site::sentenceSEO('SM:title'));
Meta::set('twitter:description',    Site::textSEO('SM:description'));
Meta::set('twitter:image',          Site::imageSEO('SM:image', 1200, 627));

$form = SiteValidation::session('site.ajax.appoint');

$services = Service::select(array(
    'columns'   => "title:lg, price:lg, description:lg, has_page",
    'where'     => "visible = 1",
    'order'     => "`order` ASC, id_service DESC",
    'files'     => true
));
