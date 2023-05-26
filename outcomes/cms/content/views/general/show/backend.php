<?php

use Arshwell\Monolith\Meta;
use Arshwell\Monolith\Web;

use Arshavinel\ElleTherapy\Validation\CMSValidation;
use Arshavinel\ElleTherapy\View\Site;

$source = Site::field('source', "id_view_site = ? AND global = 1", array(Web::param('id')));

if ($source === NULL) {
    Web::go('cms.content.views.general.all');
    exit;
}

$views = Site::select(
    array(
        'columns'   => "source, type, info, value:lg, vars",
        'where'     => "source = ? AND (type != ? AND type != ? AND type != ?) AND global = 1",
        'order'     => "`order` ASC",
        'files'     => false
    ),
    array(
        ':lg' => (Site::TRANSLATOR)::LANGUAGES, $source,
        Site::TYPES['sentenceSEO'], Site::TYPES['textSEO'], Site::TYPES['imageSEO']
    )
);

$form = CMSValidation::session("cms.content.views.ajax.update", $source);

Meta::set('title', 'Conținut general');
