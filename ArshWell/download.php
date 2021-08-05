<?php

use App\Core\Session;
use App\Core\Folder;
use App\Core\File;
use App\Core\ENV;
use App\Core\URL;
use App\Core\DB;

session_start();

require("App/Core/ENV.php");

DB::connect('default');
Session::set(ENV::url().ENV::db('conn.default.name'));

$filepath = ltrim(preg_replace('~^'. ENV::root() .'~', '', URL::path()), '/');

if (is_file($filepath) && ($matches = File::parsePath($filepath))
    && call_user_func_array(
        array(Folder::decode($matches['class']), 'fileAccess'),
        array($matches['id_table'], $matches['filekey'], $matches['language'], $matches['size'], $matches['extension'])
    )
) {
    header("Content-Type: ". File::mimeType($filepath));
    echo file_get_contents($filepath);
}
else {
    http_response_code(404);
}
