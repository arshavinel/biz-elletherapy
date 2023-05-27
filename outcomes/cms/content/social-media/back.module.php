<?php

use Arshwell\Monolith\Meta;

Meta::set('title', 'Social Media');

return array(
    'DB' => array(
        'conn'  => 'elletherapy',
        'table' => Arshavinel\ElleTherapy\Table\SocialMedia::class
    ),

    'PHP' => array(
        'validation' => array(
            'class' => Arshavinel\ElleTherapy\Validation\CMSValidation::class
        )
    ),

    'actions' => array(
        'select' => array(
            'columns' => array(
                'public'    => array('icon', 'text'),
                'private'   => array('visible'),
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
        'icon' => array(
            'DB' => NULL,
            'PHP' => array(
                'rules' => array(
                    'insert' => array(
                        "required|image:Arshavinel\ElleTherapy\Table\SocialMedia,icon"
                    ),
                    'update' => array(
                        "optional|image:Arshavinel\ElleTherapy\Table\SocialMedia,icon"
                    )
                )
            )
        ),

        'link' => array(
            'DB' => array(
                'column'    => 'link',
                'type'      => 'varchar'
            ),
            'PHP' => array(
                'rules' => array(
                    "required|url"
                )
            )
        ),

        'text' => array(
            'DB' => array(
                'column'    => 'text',
                'type'      => 'varchar'
            ),
            'PHP' => array(
                'rules' => array(
                    "required|minLength:10"
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
