<?php

use Arshwell\Monolith\Meta;

Meta::set('title', 'Caracteristici industrii');

return array(
    'DB' => array(
        'conn'  => 'elletherapy',
        'table' => Arshavinel\ElleTherapy\Table\Industry\Characteristic::class
    ),

    'PHP' => array(
        'validation' => array(
            'class' => Arshavinel\ElleTherapy\Validation\CMSValidation::class
        )
    ),

    'actions' => array(
        'select' => array(
            'columns' => array(
                'public' => array('id_industry', 'text')
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
        'id_industry' => array(
            'DB' => array(
                'column'    => 'id_industry',
                'type'      => 'int',

                'join'      => array(
                    'table'     => Arshavinel\ElleTherapy\Table\Industry::class,
                    'column'    => 'title'
                )
            ),
            'PHP' => array(
                'rules' => array(
                    "required|int",
                    "inDB:".Arshavinel\ElleTherapy\Table\Industry::class
                )
            )
        ),

        'text' => array(
            'DB' => array(
                'column'    => 'text',
                'type'      => 'text'
            ),
            'PHP' => array(
                'rules' => array(
                    "required|minLength:20"
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
