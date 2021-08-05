<?php

namespace App\Views;

use App\Core\Table\TableView;
use App\Languages\LangSite;

class Site extends TableView {
    const TABLE         = 'views_site';
    const PRIMARY_KEY   = 'id_view_site';

    const TRANSLATOR    = LangSite::class;
}
