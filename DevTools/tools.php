<?php

use App\Core\Arsh;

/**
 * Preparation for development mode actions.
 * These are used for helping developer in his process.

 *******************************
 * rshwll   -> arshwell
 * pnl      -> panel
 * hdr      -> header
 * fl       -> file
 ***** just removed vowels *****

 * @package DevTools
 * @author Tanasescu Valentin <valentin_tanasescu.2000@yahoo.com>
 */

if (!empty($_REQUEST['rshwll']) && $_REQUEST['rshwll'] == substr(md5(Arsh::VERSION), 0, 5)) {
    call_user_func(function () {
        // DevTool panel action
        if (!empty($_REQUEST['pnl']) && is_file("DevTools/tools/panel/". $_REQUEST['pnl'] .".php")) {
            http_response_code(200);
            require("DevTools/tools/panel/". $_REQUEST['pnl'] .".php");
            exit;
        }

        // DevTool file
        if (!empty($_GET['hdr']) && !empty($_GET['fl']) && is_file("DevTools/tools/files/". $_GET['fl'])) {
            ini_set('memory_limit', '-1');
            http_response_code(200);
            header("Content-Type: ". $_GET['hdr']);
            echo file_get_contents("DevTools/tools/files/". $_GET['fl']);
            if (!empty($_GET['dlt']) && $_GET['dlt'] == '1') {
                unlink("DevTools/tools/files/". $_GET['fl']);
            }
            exit;
        }
    });
}
