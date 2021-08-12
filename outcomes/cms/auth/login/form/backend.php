<?php

use Arsh\Core\Filter;
use Arsh\Core\Meta;
use Arsh\Core\Text;
use Arsh\Core\Web;
use Arsh\Core\ENV;
use Brain\Validation\CMSValidation;
use Brain\Table\CMS\Admin;

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
