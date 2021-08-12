<?php

use Arsh\Core\Meta;
use Brain\View\Site;

Meta::set('title',			Site::sentenceSEO('title'));
Meta::set('description',	Site::textSEO('description'));
Meta::set('keywords',		Site::sentenceSEO('keywords'));

Meta::set('og:title',               Site::sentenceSEO('SM:title'));
Meta::set('og:description',         Site::textSEO('SM:description'));
Meta::set('twitter:title',          Site::sentenceSEO('SM:title'));
Meta::set('twitter:description',    Site::textSEO('SM:description'));
