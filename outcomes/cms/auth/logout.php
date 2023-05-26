<?php

use Arshwell\Monolith\Web;

use Arshavinel\ElleTherapy\Validation\CMSValidation;
use Arshavinel\ElleTherapy\Table\Account\Admin\Profile;
use Arshavinel\ElleTherapy\Table\Account\Admin\Log;

$form = CMSValidation::run($_POST);

if ($form->valid()) {
    // include admin logout time
    Log::update(
        array(
            'set' => "logged_out_at = UNIX_TIMESTAMP()",
            'where' => "id_log = ?"
        ),
        array(Profile::auth('id_log'))
    );

	if (Profile::issetCookieID()) {
		Profile::setCookieID(Profile::getCookieID(), -3600); // 1 hour ago
	}
	Profile::logoutID();
}

Web::go('cms.auth.login.form');
exit;
