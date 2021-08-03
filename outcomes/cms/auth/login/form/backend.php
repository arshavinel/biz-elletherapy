<?php

use App\Core\Filter;
use App\Core\Meta;
use App\Core\Text;
use App\Core\Web;
use App\Core\ENV;
use App\Validations\CMSValidation;
use App\Tables\CMS\Admin;

if (Admin::loggedInID()) {
	if (!empty($_GET['url']) && Filter::isURL($_GET['url'])) {
        header("Location: " . $_GET['url'], true, 301);
    }
	else {
		Web::go('cms.home', NULL, NULL, 0, NULL, 301);
	}
	exit;
}

Meta::set('title', 'CMS');

$form = CMSValidation::session('cms.auth.login.submit');
$container = Text::slug(ENV::url());
