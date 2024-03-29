<?php

use Arshwell\Monolith\Table\Files\Image;
use Arshwell\Monolith\StaticHandler;
use Arshwell\Monolith\Meta;
use Arshwell\Monolith\Web;
use Arshwell\Monolith\URL;

use Arshavinel\ElleTherapy\Table\Identity\Logo;
use Arshavinel\ElleTherapy\Table\Maintenance;
use Arshavinel\ElleTherapy\View\Site;

if (Maintenance::isActive() == false) {
    Web::go('site.home');
    exit;
}

$logo = (new Image(Logo::class, Logo::field('id_logo', "visible = 1"), 'useful'))->url('medium');

$web = Web::prepare(
    preg_replace('~^'. StaticHandler::getEnvConfig()->getSiteRoot() .'~', '', urldecode(URL::path())),
    $_SERVER['REQUEST_METHOD']
);

if ($web->inGroup('site')) {
    Meta::set('title',			Site::sentenceSEO('title', NULL, $web->key()));
    Meta::set('description',	Site::textSEO('description', NULL, $web->key()));
    Meta::set('keywords',		Site::sentenceSEO('keywords', NULL, $web->key()));

    Meta::set('og:title',               Site::sentenceSEO('SM:title', NULL, $web->key()));
    Meta::set('og:description',         Site::textSEO('SM:description', NULL, $web->key()));
    Meta::set('og:image',               Site::imageSEO('SM:image', 1200, 627, $web->key()));
    Meta::set('twitter:title',          Site::sentenceSEO('SM:title', NULL, $web->key()));
    Meta::set('twitter:description',    Site::textSEO('SM:description', NULL, $web->key()));
    Meta::set('twitter:image',          Site::imageSEO('SM:image', 1200, 627, $web->key()));
}
else if ($web->inGroup('cms')) {
    Meta::set('title', 'CMS');
}
else if ($web->inGroup('404')) {
    Meta::set('title', '404');
    http_response_code(404);
}
