<?php

use App\Core\Table\TableField;
use App\Core\Meta;
use App\Core\DB;
use App\Views\Site;

$views = array_column(DB::select(array(
    'class'     => Site::class,
    'columns'   => Site::PRIMARY_KEY . ", COUNT(DISTINCT info, type) AS count",
    'group'     => "source",
    'order'     => "updated_at DESC, count DESC",
    'where'     => "global = 1"
)), 'count', Site::PRIMARY_KEY);

foreach ($views as $id_view => &$view) {
    $view = array(
        'source'        => new TableField(Site::class, $id_view, 'source'),
        'count'         => $view,
        'updated_at'    => new TableField(Site::class, $id_view, 'updated_at')
    );

    unset($view);
}

Meta::set('title', 'Conținut general');
