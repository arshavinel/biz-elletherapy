<?php

use Arsh\Core\Meta;
use Arsh\Core\ENV;
use Brain\Table\CMS\Admin;

if (ENV::board('dev')) {
    $admin = Admin::first(array(
        'columns'   => "password",
        'where'     => "id_cms_role = 1 AND email = 'hello@iscreambrands.ro'"
    ));
    $password = password_hash('CMS=he-lo!', PASSWORD_DEFAULT);

    if (!$admin) {
        Admin::insert(
            "id_cms_role, email, name, password, inserted_at",
            "1, 'hello@iscreambrands.ro', 'iscreambrands', ?, UNIX_TIMESTAMP()",
            array($password)
        );
    }
    else if ($admin->password != $password) {
        $admin->password = $password;

        $admin->edit();
    }
}

Meta::set('description', "Dă-i viață site-ului editându-l din CMS. Mult spor!");
