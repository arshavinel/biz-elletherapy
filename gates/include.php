<?php

use Arsh\Core\Web;

if (Web::inGroup('site') || Web::is('404.site')) {
	foreach (glob("gates/site/*.php") as $file) {
		require($file);
	}
}
else if (Web::inGroup('cms') || Web::is('404.cms')) {
	foreach (glob("gates/cms/*.php") as $file) {
		require($file);
	}
}
