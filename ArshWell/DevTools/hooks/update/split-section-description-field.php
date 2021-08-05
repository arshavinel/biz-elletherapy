<?php

use App\Core\DB;
use App\Core\File;

return function (array $params) {
    $message = array();

    foreach (File::folder('App/Tables/Section') as $file) {
        $class = str_replace('/', '\\', File::name($file, false));

        if (class_exists($class)) {
            $columns = array_column(($class)::columns(), 'COLUMN_NAME');

            foreach ((($class)::TRANSLATOR)::LANGUAGES as $language) {
                if (in_array('description_'.$language, $columns)) {
                    // NOTE: modules are synced already so new new columns are in db

                    if (in_array('description_1', ($class)::TRANSLATED)) {
                        // it creates/modifies the column
                        DB::alterTable(($class)::TABLE, NULL, 'description_1_'.$language, 'MEDIUMTEXT');

                        ($class)::update(array(
                            'set' => "description_1_".$language." = description_".$language
                        ));

                        // we don't need this column anymore
                        DB::alterTable(($class)::TABLE, 'DROP COLUMN', 'description_'.$language);

                        $message[] = "description_".$language." renamed to description_1_".$language;
                    }
                    if (in_array('description_2', ($class)::TRANSLATED)) {
                        // it creates/modifies the column
                        DB::alterTable(($class)::TABLE, NULL, 'description_2_'.$language, 'MEDIUMTEXT NULL');

                        $message[] = "description_2_".$language." added";
                    }
                }
            }
        }
    }

    return (ucfirst(implode(', ', $message)) ?: 'No changes done. Description column is, probably, already split.');
};
