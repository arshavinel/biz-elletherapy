<?php

return function (array $params) {
    $zip = new ZipArchive();
    $zipfile = $params['archive']['tmp_name'];

    switch ($zip->open($zipfile)) {
		case TRUE: {
            $folders = array( // Standard CMS stuff which should be updated
                'gates/cms',
                'layouts/cms',
                'outcomes/404/cms',
                'outcomes/cms/admins',
                'outcomes/cms/auth',
                'outcomes/cms/content/views',
                'pieces/cms',
            );

            $exceptions = array(
                'gates/cms/config.php'
            );

            $appended = 0;

            for ($i = 0; $i < $zip->numFiles; $i++) {
                $file = $zip->getNameIndex($i);

                if (!in_array($file, $exceptions)) {
                    foreach ($folders as $folder) {
                        if (is_dir($folder) && preg_match("~^$folder/.+~", $file)) {
                            if (is_dir(dirname($file)) || mkdir(dirname($file), Folder::MODE, true)) {
                                copy('zip://'. $zipfile .'#'. $file, $file);
                                $appended++;
                            }
                            break;
                        }
                    }
                }
            }

            return "Standard CMS stuff appended ($appended)!";
        }
        case ZipArchive::ER_EXISTS: {
            return "Zip already exists.";
        }
        case ZipArchive::ER_INCONS: {
            return "Zip archive inconsistent.";
        }
        case ZipArchive::ER_INVAL: {
            return "Invalid argument.";
        }
        case ZipArchive::ER_MEMORY: {
            return "Malloc failure.";
        }
        case ZipArchive::ER_NOENT: {
            return "No such file.";
        }
        case ZipArchive::ER_NOZIP: {
            return "Not a zip archive.";
        }
        case ZipArchive::ER_OPEN: {
            return "Can't open file.";
        }
        case ZipArchive::ER_READ: {
            return "Read error.";
        }
        case ZipArchive::ER_SEEK: {
            return "Seek error.";
        }
    }
};
