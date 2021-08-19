<?php

use Arsh\Core\Meta;
use Brain\Git;

Meta::set('robots', 'noindex, nofollow');

date_default_timezone_set('Europe/Bucharest');

Git::inform();
