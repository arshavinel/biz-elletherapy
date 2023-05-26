<?php

use Arshwell\Monolith\Web;
use Arshwell\Monolith\URL;

use Arshavinel\ElleTherapy\Table\Account\Admin\Profile;
use Arshavinel\ElleTherapy\Table\Account\Admin\Log;

if (!Profile::loggedInID() && !Web::inGroup('cms.auth.login')) {
	if (Profile::issetCookieID() && Profile::count(Profile::PRIMARY_KEY .' = '. Profile::getCookieID())) {
		$admin = Profile::first(
	        array(
	            'columns'   => "account_admin_profiles.email, account_admin_profiles.name, account_admin_profiles.id_role, account_admin_roles.title AS `role`",
	            'join'      => array(
	                'INNER',
	                'account_admin_roles',
	                "account_admin_profiles.id_role = account_admin_roles.id_role"
	            ),
	            'where'     => "account_admin_profiles.id_profile = ?"
	        ),
	        array(Profile::getCookieID())
	    );

        $admin->id_log = Log::insert(
            "id_profile, logged_in_at, from_cookie",
            "?, UNIX_TIMESTAMP(), 1",
            array($admin->id())
        );

	    Profile::loginID($admin->id(), $admin->toArray());
	}
	else {
		if ($_SERVER['REQUEST_METHOD'] == 'GET') {
			Web::go('cms.auth.login.form', NULL, Web::language(), Web::page(), array('url'=>URL::get()), 301);
		}
		else {
			http_response_code(403); // forbidden
		}
		exit;
	}
}
