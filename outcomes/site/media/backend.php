<?php

use Arsh\Core\Meta;
use Brain\Table\Media;
use Brain\View\Site;

Meta::set('title',			Site::sentenceSEO('title'));
Meta::set('description',	Site::textSEO('description'));
Meta::set('keywords',		Site::sentenceSEO('keywords'));

Meta::set('og:title',               Site::sentenceSEO('SM:title'));
Meta::set('og:description',         Site::textSEO('SM:description'));
Meta::set('og:image',               Site::imageSEO('SM:image', 1200, 627));
Meta::set('twitter:title',          Site::sentenceSEO('SM:title'));
Meta::set('twitter:description',    Site::textSEO('SM:description'));
Meta::set('twitter:image',          Site::imageSEO('SM:image', 1200, 627));

$media = Media::all('src, title:lg, description:lg');
