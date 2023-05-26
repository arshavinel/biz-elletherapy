<?php

namespace Arshavinel\ElleTherapy\Table\Account\Admin;

use Arshwell\Monolith\Table\TableAuth;

use Arshavinel\ElleTherapy\Language\LangCMS;

final class Profile extends TableAuth {
    const TABLE       = 'account_admin_profiles';
    const PRIMARY_KEY = 'id_profile';

    const TRANSLATOR = LangCMS::class;

    const FILES = array(
        'avatar' => array(
            'sizes' => array(
                'tinny' => array(
                    'width' => 96,
                    'height' => 96
                )
            )
        )
    );
}
