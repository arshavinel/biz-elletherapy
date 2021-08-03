<?php

namespace App\Tables\CMS;

use App\Core\Table\TableAuth;

final class Admin extends TableAuth {
    const TABLE       = 'cms_admins';
    const PRIMARY_KEY = 'id_cms_admin';

    const CUSTOM_SCSS_VARS_COLUMN = 'scss_vars';
}
