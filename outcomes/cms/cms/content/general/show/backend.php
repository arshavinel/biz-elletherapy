<?php

use Arshwell\Monolith\Meta;
use Arshwell\Monolith\Web;
use Arshavinel\ElleTherapy\Validation\CMSValidation;
use Arshavinel\ElleTherapy\View\CMS;

$source = CMS::field('source', "id_view = ? AND global = 1", array(Web::param('id')));

if ($source === NULL) {
    Web::go('cms.content.general.all');
    exit;
}

$views = CMS::select(
    array(
        'columns'   => "source, type, info, value:lg, vars",
        'where'     => "source = ? AND (type != ? AND type != ? AND type != ?) AND global = 1",
        'order'     => "`order` ASC",
        'files'     => false
    ),
    array(
        ':lg' => (CMS::TRANSLATOR)::LANGUAGES, $source,
        CMS::TYPES['sentenceSEO'], CMS::TYPES['textSEO'], CMS::TYPES['imageSEO']
    )
);

$form = CMSValidation::session("cms.ajax.content.update", $source);

Meta::set('title', 'Conținut general');
