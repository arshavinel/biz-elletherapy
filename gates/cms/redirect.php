<?php

use App\Core\Web;
use App\Core\URL;
use App\Tables\CMS\Admin;

if (!Admin::loggedInID() && !Web::inGroup('cms.auth.login')) {
	if (Admin::issetCookieID() && Admin::count(Admin::PRIMARY_KEY .' = '. Admin::getCookieID())) {
		$admin = Admin::first(
	        array(
	            'columns'   => "cms_admins.email, cms_admins.name, cms_admins.id_cms_role, cms_roles.title AS `role`",
	            'join'      => array(
	                'INNER',
	                'cms_roles',
	                "cms_admins.id_cms_role = cms_roles.id_cms_role"
	            ),
	            'where'     => "cms_admins.id_cms_admin = ?"
	        ),
	        array(Admin::getCookieID())
	    );

	    Admin::loginID($admin->id(), $admin->toArray());
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
