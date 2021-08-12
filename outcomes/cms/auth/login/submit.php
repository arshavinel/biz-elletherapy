<?php

use Arsh\Core\Text;
use Arsh\Core\Web;
use Arsh\Core\ENV;
use Brain\Validation\CMSValidation;
use Brain\Table\CMS\Admin;

$container = Text::slug(ENV::url());

$form = CMSValidation::run($_POST, array(
    'url' => array(
        'optional|is_string|url'
    ),
    $container => array(
        'email' => array(
            "required|likeDB:".Admin::class
        ),
        'password' => array(
            "required",
            function ($key, $value) use ($container) {
                if (!self::error("$container.email")
                && !password_verify($value, Admin::field('password', "email LIKE ?", array(self::value("$container.email"))))) {
                    return "Parolă incorectă";
                }
            }
        )
    )
));

if ($form->valid()) {
    $admin = Admin::first(
        array(
            'columns'   => "cms_admins.email, cms_admins.name, cms_admins.id_cms_role, cms_roles.title AS `role`",
            'join'      => array(
                'INNER',
                'cms_roles',
                'cms_admins.id_cms_role = cms_roles.id_cms_role'
            ),
            'where'     => "email LIKE ?"
        ),
        array($form->value("$container.email"))
    );

    Admin::loginID($admin->id(), $admin->toArray());
    Admin::setCookieID($admin->id(), (3 * 24 * 60 * 60)); // 3 days

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
