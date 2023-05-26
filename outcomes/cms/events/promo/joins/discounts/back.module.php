<?php

use Arshwell\Monolith\Meta;

use Arshavinel\ElleTherapy\Validation\CMSValidation;
use Arshavinel\ElleTherapy\Table\Event\Promo\Discount\Join;
use Arshavinel\ElleTherapy\Table\Event\Promo\Discount;

Meta::set('title', "Reduceri aplicări");

return array(
    'DB' => array(
        'conn'  => 'elletherapy',
        'table' => Join::class
    ),

    'PHP' => array(
        'validation' => array(
            'class' => CMSValidation::class
        )
    ),

    'actions' => array(
        'select' => array(
            'columns' => array(
                'public' => array('id_discount', 'email')
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
        'id_discount' => array(
            'DB' => array(
                'column'    => 'id_discount',
                'type'      => 'int',
                'null'      => true,

                'join'      => array(
                    'table'     => Discount::class,
                    'column'    => 'title'
                )
            ),
            'PHP' => array(
                'rules' => array(
                    "required|int",
                    "inDB:".Discount::class.','.Discount::PRIMARY_KEY
                )
            )
        ),

        'email' => array(
            'DB' => array(
                'column'    => 'email',
                'type'      => 'varchar',
                'length'    => 100
            ),
            'PHP' => array(
                'rules' => array(
                    "required|email|maxLength:100"
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
