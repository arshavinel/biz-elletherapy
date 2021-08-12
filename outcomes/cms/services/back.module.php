<?php

use Arsh\Core\Meta;

Meta::set('title', 'Servicii');

return array(
    'DB' => array(
        'conn'  => 'default',
        'table' => Brain\Table\Service::class
    ),

    'PHP' => array(
        'validation' => array(
            'class' => Brain\Validation\CMSValidation::class
        )
    ),

    'actions' => array(
        'select' => array(
            'columns' => array(
                'public'    => array('preview', 'title', 'price', 'description'),
                'private'   => array('visible', 'has_page')
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
        'preview' => array(
            'DB' => NULL,
            'PHP' => array(
                'rules' => array(
                    'insert' => array(
                        "required|image:Brain\Table\Service,preview"
                    ),
                    'update' => array(
                        "optional|image:Brain\Table\Service,preview"
                    )
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
                    "required|minLength:4"
                )
            )
        ),

        'price' => array(
            'DB' => array(
                'column'    => 'price',
                'type'      => 'varchar'
            ),
            'PHP' => array(
                'rules' => array(
                    "required|minLength:4"
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
                    "required|minLength:100"
                )
            )
        ),

        'visible' => array(
            'DB' => array(
                'column'    => 'visible',
                'type'      => 'tinyint',
                'default'   => 0
            ),
            'PHP' => array(
                'rules' => array(
                    function ($value) {
                        if ($value == NULL) {
                            $value = 0;
                        }
                        return $value;
                    },
                    "inArray:0,1"
                )
            )
        ),

        'has_page' => array(
            'DB' => array(
                'column'    => 'has_page',
                'type'      => 'tinyint',
                'default'   => 0
            ),
            'PHP' => array(
                'rules' => array(
                    function ($value) {
                        if ($value == NULL) {
                            $value = 0;
                        }
                        return $value;
                    },
                    "inArray:0,1"
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
