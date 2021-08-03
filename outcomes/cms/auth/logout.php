<?php

use App\Core\Web;
use App\Validations\CMSValidation;
use App\Tables\CMS\Admin;

$form = CMSValidation::run($_POST);

if ($form->valid()) {
	if (Admin::issetCookieID()) {
		Admin::setCookieID(Admin::getCookieID(), -3600); // 1 hour ago
	}
	Admin::logoutID();
}

Web::go('cms.auth.login.form');
exit;
