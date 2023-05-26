<?php

use Arshwell\Monolith\Text;
use Arshwell\Monolith\Web;
use Arshwell\Monolith\StaticHandler;

use Arshavinel\ElleTherapy\Validation\CMSValidation;
use Arshavinel\ElleTherapy\Table\Account\Admin\Profile;
use Arshavinel\ElleTherapy\Table\Account\Admin\Log;

$container = Text::slug(StaticHandler::getEnvConfig('web.URL'));

$form = CMSValidation::run($_POST, array(
    'url' => array(
        'optional|is_string|url'
    ),
    $container => array(
        'email' => array(
            "required|likeDB:".Profile::class
        ),
        'password' => array(
            "required",
            function ($key, $value) use ($container) {
                if (!self::error("$container.email")
                && !password_verify($value, Profile::field('password', "email LIKE ?", array(self::value("$container.email"))))) {
                    return "Parolă incorectă";
                }
            }
        )
    )
));

if ($form->valid()) {
    $admin = Profile::first(
        array(
            'columns'   => "account_admin_profiles.email, account_admin_profiles.name, account_admin_profiles.id_role, account_admin_roles.title AS `role`",
            'join'      => array(
                'INNER',
                'account_admin_roles',
                'account_admin_profiles.id_role = account_admin_roles.id_role'
            ),
            'where'     => "email LIKE ?"
        ),
        array($form->value("$container.email"))
    );

    $admin->id_log = Log::insert(
        "id_profile, logged_in_at, browser, os, touch, mobile, tablet",
        "?, UNIX_TIMESTAMP(), ?, ?, ?, ?, ?",
        array($admin->id(), $form->value('device.browser'), $form->value('device.os'), $form->value('device.touch'), $form->value('device.mobile'), $form->value('device.tablet'))
    );

    Profile::loginID($admin->id(), $admin->toArray());
    Profile::setCookieID($admin->id(), (3 * 24 * 60 * 60)); // 3 days

    $form->forget();

    if ($form->value('url')) {
        header("Location: " . $form->value('url'), true, 301);
        exit;
    }
}
else {
    $form->remember(true);
}

if (!Web::goBack()) {
	Web::go('cms.auth.login.form', NULL, NULL, 0, ['url'=>$form->value('url')], 301);
}
