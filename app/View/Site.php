<?php

namespace Arshavinel\ElleTherapy\View;

use Arshwell\Monolith\Table\TableView;

use Arshavinel\ElleTherapy\Language\LangSite;

class Site extends TableView {
    const TABLE         = 'views_site';
    const PRIMARY_KEY   = 'id_view';

    const TRANSLATOR    = LangSite::class;
}
