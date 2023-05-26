<?php

use Arshwell\Monolith\Meta;

Meta::set('title',			'404');
Meta::set('description',	'404');
Meta::set('keywords',		'404');

Meta::set('robots',         'noindex, nofollow');

http_response_code(404);
