<?php

namespace Arshavinel\ElleTherapy\View;

use Arshwell\Monolith\Table\TableView;

use Arshavinel\ElleTherapy\Language\LangCMS;
use Arshavinel\ElleTherapy\Table\Account\Admin\Profile;

class CMS extends TableView {
    const TABLE         = 'views_cms';
    const PRIMARY_KEY   = 'id_view';

    const TRANSLATOR    = LangCMS::class;

    static function fileAccess (int $id_table, string $file): bool {
        return Profile::loggedInID();
    }
}
