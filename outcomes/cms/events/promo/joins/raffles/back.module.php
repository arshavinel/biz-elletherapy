<?php

use App\Core\Meta;
use App\Core\Table\TableValidationResponse;
use App\Tables\Event\Promo\Raffle\Join;
use App\Tables\Event\Promo\Raffle;

Meta::set('title', "Tombole aplicări");

return array(
    'DB' => array(
        'conn'  => 'default',
        'table' => Join::class
    ),

    'PHP' => array(
        'validation' => array(
            'class' => App\Validations\CMSValidation::class
        )
    ),

    'actions' => array(
        'select' => array(
            'columns' => array(
                'public' => array('id_raffle', 'name', 'email')
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
        'id_raffle' => array(
            'DB' => array(
                'column'    => 'id_raffle',
                'type'      => 'int',
                'from'      => array(
                    'table'     => Raffle::class,
                    'column'    => 'title'
                )
            ),
            'PHP' => array(
                'rules' => array(
                    "required|int",
                    "inDB:".Raffle::class.','.Raffle::PRIMARY_KEY
                )
            )
        ),

        'name' => array(
            'DB' => array(
                'column'    => 'name',
                'type'      => 'varchar',
                'length'    => 100
            ),
            'PHP' => array(
                'rules' => array(
                    "required|minLength:5|maxLength:100"
                )
            )
        ),

        'phone' => array(
            'DB' => array(
                'column'    => 'phone',
                'type'      => 'varchar',
                'length'    => 20,
                'null'      => true
            ),
            'PHP' => array(
                'rules' => array(
                    "minLength:10|maxLength:20"
                )
            )
        ),

        'email' => array(
            'DB' => array(
                'column'    => 'email',
                'type'      => 'varchar',
                'length'    => 100,
                'null'      => true
            ),
            'PHP' => array(
                'rules' => array(
                    "email|maxLength:100"
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
