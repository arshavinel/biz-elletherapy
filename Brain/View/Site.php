<?php

namespace Brain\View;

use Arsh\Core\Table\TableView;
use Brain\Language\LangSite;

class Site extends TableView {
    const TABLE         = 'views_site';
    const PRIMARY_KEY   = 'id_view_site';

    const TRANSLATOR    = LangSite::class;
}
