<?php

use Arshwell\Monolith\Meta;
use Arshwell\Monolith\Text;
use Arshwell\Monolith\Web;

use Arshavinel\ElleTherapy\Table\Service;

$service = Service::first(
    array(
        'columns'   => 'title:lg, description:lg',
        'where'     => "visible = 1 AND has_page = 1 AND id_service = ?",
        'files'     => true
    ),
    array(Web::param('id'))
);

if (!$service) {
    Web::go('site.services.all');
    exit;
}

if (Web::param('slug') != Text::slug($service->translation('title'))) {
    Web::go('site.services.service', [
        'id'    => $service->id(),
        'slug'  => $service->translation('title')
    ]);
    exit;
}

$seo_description = trim(Text::words(Text::removeAllTags($service->translation('description')), 100));

Meta::set('title',			$service->translation('title'));
Meta::set('description',	$seo_description);
Meta::set('keywords',		trim(str_replace([' ', ',,'], ',', $service->translation('title'))));

Meta::set('og:title',               $service->translation('title'));
Meta::set('og:description',         $seo_description);
Meta::set('og:image',               $service->file('preview')->url('big'));
Meta::set('twitter:title',          $service->translation('title'));
Meta::set('twitter:description',    $seo_description);
Meta::set('twitter:image',          $service->file('preview')->url('big'));
