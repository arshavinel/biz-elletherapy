<?php

use Arshwell\Monolith\Meta;

Meta::set('title', 'Logo-uri');

return array(
    'DB' => array(
        'conn'  => 'elletherapy',
        'table' => Arshavinel\ElleTherapy\Table\Identity\Logo::class
    ),

    'PHP' => array(
        'validation' => array(
            'class' => Arshavinel\ElleTherapy\Validation\CMSValidation::class
        )
    ),

    'actions' => array(
        'select' => array(
            'columns' => array(
                'public'    => array('favicon_site', 'header'),
                'private'   => array('visible')
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
        'favicon_cms' => array(
            'DB' => NULL,
            'PHP' => array(
                'rules' => array(
                    'insert' => array(
                        "required|image:Arshavinel\ElleTherapy\Table\Identity\Logo,favicon_cms"
                    ),
                    'update' => array(
                        "optional|image:Arshavinel\ElleTherapy\Table\Identity\Logo,favicon_cms"
                    )
                )
            )
        ),

        'favicon_site' => array(
            'DB' => NULL,
            'PHP' => array(
                'rules' => array(
                    'insert' => array(
                        "required|image:Arshavinel\ElleTherapy\Table\Identity\Logo,favicon_site"
                    ),
                    'update' => array(
                        "optional|image:Arshavinel\ElleTherapy\Table\Identity\Logo,favicon_site"
                    )
                )
            )
        ),

        'header' => array(
            'DB' => NULL,
            'PHP' => array(
                'rules' => array(
                    'insert' => array(
                        "required|image:Arshavinel\ElleTherapy\Table\Identity\Logo,header"
                    ),
                    'update' => array(
                        "optional|image:Arshavinel\ElleTherapy\Table\Identity\Logo,header"
                    )
                )
            )
        ),

        'useful' => array(
            'DB' => NULL,
            'PHP' => array(
                'rules' => array(
                    'insert' => array(
                        "required|image:Arshavinel\ElleTherapy\Table\Identity\Logo,useful"
                    ),
                    'update' => array(
                        "optional|image:Arshavinel\ElleTherapy\Table\Identity\Logo,useful"
                    )
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
                        return (int)$value;
                    }
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
