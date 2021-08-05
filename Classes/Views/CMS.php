<?php

namespace App\Views;

use App\Core\Table\TableView;
use App\Languages\LangCMS;
use App\Tables\Admin;

class CMS extends TableView {
    const TABLE         = 'views_cms';
    const PRIMARY_KEY   = 'id_view_cms';

    const TRANSLATOR    = LangCMS::class;

    static function fileAccess (int $id_table, string $file): bool {
        return Admin::loggedInID();
    }
}
