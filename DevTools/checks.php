<?php

use App\Core\File;

/**
 * We are including all helpfull functions for development mode.
 * Every function runs only if the IP belongs to a developer.

 * @package App/DevTools
 * @author Tanasescu Valentin <valentin_tanasescu.2000@yahoo.com>
 */
call_user_func(function () {
    require("DevTools/checks/php-settings.php");

    $filemtime = filemtime("DevTools/checks/web.routes.php");
    foreach (File::rFolder('forks') as $file) {
        if (filemtime($file) > $filemtime) {
            require("DevTools/checks/web.routes.php");
            touch("DevTools/checks/web.routes.php");
            break;
        }
    }

    if (filemtime('env.json') > filemtime("DevTools/checks/env.languages.php")) {
        require("DevTools/checks/env.languages.php");
        touch("DevTools/checks/env.languages.php");
    }

    $filemtime = filemtime("DevTools/checks/pieces-folders.php");
    foreach (File::rFolder('pieces') as $f) {
        if (filemtime($f) > $filemtime) {
            require("DevTools/checks/pieces-folders.php");
            touch("DevTools/checks/pieces-folders.php");
            break;
        }
    }
});
