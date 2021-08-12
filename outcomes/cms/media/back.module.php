<?php

use Arsh\Core\Meta;

Meta::set('title', 'Media');

return array(
    'DB' => array(
        'conn'  => 'default',
        'table' => Brain\Table\Media::class
    ),

    'PHP' => array(
        'validation' => array(
            'class' => Brain\Validation\CMSValidation::class
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

        'delete' => true
    ),

    'fields' => array(
        'video' => array(
            'DB' => NULL,
            'PHP' => array(
                'rules' => array(
                    'insert' => array(
                        "required|video:Brain\Table\Media,video"
                    ),
                    'update' => array(
                        "optional|video:Brain\Table\Media,video"
                    )
                )
            )
        ),

        'src' => array(
            'DB' => array(
                'column'    => 'src',
                'type'      => 'varchar'
            ),
            'PHP' => array(
                'rules' => array(
                    "required|minLength:10"
                )
            )
        ),

        'title' => array(
            'DB' => array(
                'column'    => 'title',
                'type'      => 'varchar'
            ),
            'PHP' => array(
                'rules' => array(
                    "required|minLength:10"
                )
            )
        ),

        'description' => array(
            'DB' => array(
                'column'    => 'description',
                'type'      => 'text'
            ),
            'PHP' => array(
                'rules' => array(
                    "required|minLength:50"
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
