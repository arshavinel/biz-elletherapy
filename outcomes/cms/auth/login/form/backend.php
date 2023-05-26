<?php

use Arshwell\Monolith\Filter;
use Arshwell\Monolith\Meta;
use Arshwell\Monolith\Text;
use Arshwell\Monolith\Web;
use Arshwell\Monolith\StaticHandler;

use Arshavinel\ElleTherapy\Validation\CMSValidation;
use Arshavinel\ElleTherapy\Table\Account\Admin\Profile;

if (Profile::loggedInID()) {
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
$container = Text::slug(StaticHandler::getEnvConfig('web.URL'));
