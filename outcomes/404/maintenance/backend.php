<?php

use App\Core\Table\Files\Image;
use App\Core\Meta;
use App\Core\ENV;
use App\Core\Web;
use App\Core\URL;
use App\Tables\Logo;
use App\Views\Site;

if (ENV::maintenance('active') == false) {
    Web::go('site.home');
    exit;
}

$logo = (new Image(Logo::class, Logo::field('id_logo', "visible = 1"), 'useful'))->url('medium');

$web = Web::prepare(
    preg_replace('~^'. ENV::root() .'~', '', urldecode(URL::path())),
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
