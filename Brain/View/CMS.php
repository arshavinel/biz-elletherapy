<?php

namespace Brain\View;

use Arsh\Core\Table\TableView;
use Brain\Language\LangCMS;
use Brain\Table\Admin;

class CMS extends TableView {
    const TABLE         = 'views_cms';
    const PRIMARY_KEY   = 'id_view_cms';

    const TRANSLATOR    = LangCMS::class;

    static function fileAccess (int $id_table, string $file): bool {
        return Admin::loggedInID();
    }
}
