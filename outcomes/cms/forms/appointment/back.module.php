<?php

use Arshwell\Monolith\Meta;

use Arshavinel\ElleTherapy\Validation\CMSValidation;
use Arshavinel\ElleTherapy\Table\Form\Appointment;

Meta::set('title', 'Formulare programări');

return array(
    'DB' => array(
        'conn'  => 'elletherapy',
        'table' => Appointment::class
    ),

    'PHP' => array(
        'validation' => array(
            'class' => CMSValidation::class
        )
    ),

    'actions' => array(
        'select' => array(
            'columns' => array(
                'public' => array('firstname', 'lastname', 'phone', 'id_service', 'message')
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
        'firstname' => array(
            'DB' => array(
                'column'    => 'firstname',
                'type'      => 'varchar'
            ),
            'PHP' => array(
                'rules' => array(
                    "required|minLength:3"
                )
            )
        ),

        'lastname' => array(
            'DB' => array(
                'column'    => 'lastname',
                'type'      => 'varchar'
            ),
            'PHP' => array(
                'rules' => array(
                    "required|minLength:3"
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
                    "email"
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
                    "required|minLength:10"
                )
            )
        ),

        'id_service' => array(
            'DB' => array(
                'column'    => 'id_service',
                'type'      => 'int',

                'join'      => array(
                    'table'     => Arshavinel\ElleTherapy\Table\Service::class,
                    'column'    => 'title'
                )
            ),
            'PHP' => array(
                'rules' => array(
                    "required|inDB:Arshavinel\ElleTherapy\Table\Service,id_service"
                )
            )
        ),

        'date' => array(
            'DB' => array(
                'column'    => 'date',
                'type'      => 'int'
            ),
            'PHP' => array(
                'rules' => array(
                    function ($value) {
                        return strtotime($value);
                    }
                )
            )
        ),

        'message' => array(
            'DB' => array(
                'column'    => 'message',
                'type'      => 'text'
            ),
            'PHP' => array(
                'rules' => array(
                    function ($value) {
                        return trim($value);
                    },
                    "maxLength:300"
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
    )
);
