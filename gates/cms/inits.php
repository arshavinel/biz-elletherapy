<?php

use Arshwell\Monolith\Meta;
use Arshwell\Monolith\Web;
use Arshwell\Monolith\StaticHandler;

use Arshavinel\ElleTherapy\Table\Account\Admin\Profile;
use Arshavinel\ElleTherapy\Table\Account\Admin\Log;

if (StaticHandler::getEnvConfig('development.debug')) {
    $admin = Profile::first(array(
        'columns'   => "password",
        'where'     => "id_role = 1 AND email = 'arshavin@arshguide.ro'"
    ));
    $password = password_hash('CMS=he-lo!', PASSWORD_DEFAULT);

    if (!$admin) {
        Profile::insert(
            "id_role, email, name, password, inserted_at",
            "1, 'arshavin@arshguide.ro', 'Arshavin', ?, UNIX_TIMESTAMP()",
            array($password)
        );
    }
    else if ($admin->password != $password) {
        $admin->password = $password;

        $admin->edit();
    }
}

if (Profile::loggedInID() && !Web::is('cms.auth.logout')) {
    // update last admin activity time
    Log::update(
        array(
            'set' => "last_activity_at = UNIX_TIMESTAMP()",
            'where' => "id_log = ?"
        ),
        array(Profile::auth('id_log'))
    );
}

Meta::set('description', "Dă-i viață site-ului editându-l din CMS. Mult spor!");
