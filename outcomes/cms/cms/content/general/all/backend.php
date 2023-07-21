<?php

use Arshwell\Monolith\Table\TableField;
use Arshwell\Monolith\Meta;
use Arshwell\Monolith\DB;

use Arshavinel\ElleTherapy\View\CMS;

$views = array_column(DB::select(array(
    'class'     => CMS::class,
    'columns'   => CMS::PRIMARY_KEY . ", COUNT(DISTINCT info, type) AS count",
    'group'     => "source",
    'order'     => "updated_at DESC, count DESC",
    'where'     => "global = 1"
)), 'count', CMS::PRIMARY_KEY);

foreach ($views as $id_view => &$view) {
    $view = array(
        'source'        => new TableField(CMS::class, $id_view, 'source'),
        'count'         => $view,
        'updated_at'    => new TableField(CMS::class, $id_view, 'updated_at')
    );

    unset($view);
}

Meta::set('title', 'Conținut general');
