<?php

use App\Core\Meta;

Meta::set('title', 'Industrii');

return array(
    'DB' => array(
        'conn'  => 'default',
        'table' => App\Tables\Industry::class
    ),

    'PHP' => array(
        'validation' => array(
            'class' => App\Validations\CMSValidation::class
        )
    ),

    'actions' => array(
        'select' => array(
            'columns' => array(
                'public' => array('title')
            ),
            'limit' => 10
        ),
        'insert' => true
    ),

    'features' => array(
        'update' => true,

        'delete' => true,

        'order' => array(
            'column' => 'order'
        )
    ),

    'fields' => array(
        'title' => array(
            'DB' => array(
                'column'    => 'title',
                'type'      => 'varchar',
                'length'    => 100
            ),
            'PHP' => array(
                'rules' => array(
                    "required|minLength:3|maxLength:100"
                )
            )
        ),

        'inserted_at' => array(
            'DB' => array(
                'column'    => 'inserted_at',
                'type'      => 'int'
            ),
            'PHP' => array(
                'rules' => array(
                    'insert' => array(
                        function ($value) {
                            return time();
                        }
                    ),
                    'update' => array(
                        function ($value) {
                            return strtotime($value);
                        }
                    )
                )
            )
        ),

        'updated_at' => array(
            'DB' => array(
                'column'    => 'updated_at',
                'type'      => 'int',
                'null'      => true
            ),
            'PHP' => array(
                'rules' => array(
                    'insert' => array(
                        function ($value) {
                            return NULL;
                        }
                    ),
                    'update' => array(
                        function ($value) {
                            return time();
                        }
                    )
                )
            )
        ),
    )
);
