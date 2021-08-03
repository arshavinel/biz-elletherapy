<?php

use App\Core\Meta;
use App\Core\Web;
use App\Validations\CMSValidation;
use App\Views\Site;

$source = Site::field('source', "id_view_site = ? AND global = 0", array(Web::param('id')));

if ($source === NULL) {
    Web::go('cms.content.views.pages.all');
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

$form = CMSValidation::session("cms.content.views.ajax.update", $source);

Meta::set('title', 'Pagină');
