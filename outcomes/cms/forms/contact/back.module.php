<?php

use Arshwell\Monolith\Meta;

Meta::set('title', 'Formulare contact');

return array(
    'DB' => array(
        'conn'  => 'elletherapy',
        'table' => Arshavinel\ElleTherapy\Table\ContactForm::class
    ),

    'PHP' => array(
        'validation' => array(
            'class' => Arshavinel\ElleTherapy\Validation\CMSValidation::class
        )
    ),

    'actions' => array(
        'select' => array(
            'columns' => array(
                'public' => array('name', 'email', 'phone', 'message')
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
        'name' => array(
            'DB' => array(
                'column'    => 'name',
                'type'      => 'varchar'
            ),
            'PHP' => array(
                'rules' => array(
                    "required|minLength:4"
                )
            )
        ),

        'email' => array(
            'DB' => array(
                'column'    => 'email',
                'type'      => 'varchar'
            ),
            'PHP' => array(
                'rules' => array(
                    "required|email"
                )
            )
        ),

        'phone' => array(
            'DB' => array(
                'column'    => 'phone',
                'type'      => 'varchar'
            ),
            'PHP' => array(
                'rules' => array(
                    "required|minLength:4"
                )
            )
        ),

        'message' => array(
            'DB' => array(
                'column'    => 'message',
                'type'      => 'text'
            ),
            'PHP' => array(
                'rules' => array()
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
    )
);
