<?php

use Arshwell\Monolith\Meta;

use Arshavinel\ElleTherapy\Table\Account\Admin\Profile;
use Arshavinel\ElleTherapy\Table\Account\Admin\Log;
use Arshavinel\ElleTherapy\Validation\CMSValidation;

Meta::set('title', 'Admins Logs');

return array(
    'DB' => array(
        'conn'  => 'elletherapy',
        'table' => Log::class
    ),

    'PHP' => array(
        'validation' => array(
            'class' => CMSValidation::class
        )
    ),

    'actions' => array(
        'select' => array(
            'columns' => array(
                'public' => array('id_profile', 'logged_in_at')
            ),
            'limit' => 15
        ),

        'insert' => false
    ),

    'features' => array(
        'update' => false,

        'delete' => false,
    ),

    'fields' => array(
        'id_profile' => array(
            'DB' => array(
                'column'    => 'id_profile',
                'type'      => 'int',

                'join'      => array(
                    'table'     => Profile::class,
                    'column'    => 'name'
                )
            ),
            'PHP' => array(
                'rules' => array(
                    "int",
                    "inDB:".Profile::class
                )
            )
        ),

        'logged_in_at' => array(
            'DB' => array(
                'column'    => 'logged_in_at',
                'type'      => 'int'
            ),
            'PHP' => array(
                'rules' => array(
                    'date',
                    function ($value) {
                        return strtotime($value);
                    }
                )
            )
        ),

        'from_cookie' => array(
            'DB' => array(
                'column'    => 'from_cookie',
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

        'last_activity_at' => array(
            'DB' => array(
                'column'    => 'last_activity_at',
                'type'      => 'int',
                'null'      => true
            ),
            'PHP' => array(
                'rules' => array(
                    'date',
                    function ($value) {
                        return strtotime($value);
                    }
                )
            )
        ),

        'logged_out_at' => array(
            'DB' => array(
                'column'    => 'logged_out_at',
                'type'      => 'int',
                'null'      => true
            ),
            'PHP' => array(
                'rules' => array(
                    'date',
                    function ($value) {
                        return strtotime($value);
                    }
                )
            )
        ),

        'browser' => array(
            'DB' => array(
                'column'    => 'browser',
                'type'      => 'varchar',
                'null'      => true,
            ),
            'PHP' => array(
                'rules' => array(
                    "required",
                    function ($value) {
                        return trim($value);
                    },
                    "minLength:3"
                )
            )
        ),

        'os' => array(
            'DB' => array(
                'column'    => 'os',
                'type'      => 'varchar',
                'null'      => true,
            ),
            'PHP' => array(
                'rules' => array(
                    "required",
                    function ($value) {
                        return trim($value);
                    },
                    "minLength:3"
                )
            )
        ),

        'touch' => array(
            'DB' => array(
                'column'    => 'touch',
                'type'      => 'tinyint',
                'null'      => true,
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

        'mobile' => array(
            'DB' => array(
                'column'    => 'mobile',
                'type'      => 'varchar',
                'null'      => true,
                'null'      => true,
            ),
            'PHP' => array(
                'rules' => array(
                    "required",
                    function ($value) {
                        return trim($value);
                    },
                    "minLength:3"
                )
            )
        ),

        'tablet' => array(
            'DB' => array(
                'column'    => 'tablet',
                'type'      => 'tinyint',
                'null'      => true,
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
    )
);
