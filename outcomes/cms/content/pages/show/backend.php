<?php

use Arshwell\Monolith\Meta;
use Arshwell\Monolith\Web;

use Arshavinel\ElleTherapy\Validation\CMSValidation;
use Arshavinel\ElleTherapy\View\Site;

$source = Site::field('source', "id_view = ? AND global = 0", array(Web::param('id')));

if ($source === NULL) {
    Web::go('cms.content.pages.all');
    exit;
}

$view = array(
    'fields' => Site::select(
        array(
            'columns'   => "type, info, vars",
            'where'     => "source = ? AND (type != ? AND type != ? AND type != ?) AND global = 0",
            'order'     => "`order` ASC",
            'files'     => true
        ),
        array($source, Site::TYPES['sentenceSEO'], Site::TYPES['textSEO'], Site::TYPES['imageSEO'])
    ),
    'SEO' => Site::select(
        array(
            'columns'   => "type, info, vars",
            'where'     => "source = ? AND (type = ? OR type = ? OR type = ?)",
            'order'     => "`order` ASC",
            'files'     => true
        ),
        array($source, Site::TYPES['sentenceSEO'], Site::TYPES['textSEO'], Site::TYPES['imageSEO'])
    )
);

$form = CMSValidation::session("cms.ajax.content.update", $source);

Meta::set('title', 'Pagină');
