<?php

use Arshwell\Monolith\Meta;
use Arshwell\Monolith\Web;

use Arshavinel\ElleTherapy\Table\Account\Admin\Profile;
use Arshavinel\ElleTherapy\Table\Account\Admin\Role;

Meta::set('title', 'Admini');

return array(
    'DB' => array(
        'conn'  => 'elletherapy',
        'table' => Profile::class
    ),

    'PHP' => array(
        'validation' => array(
            'class' => Arshavinel\ElleTherapy\Validation\CMSValidation::class
        )
    ),

    'actions' => array(
        'select' => array(
            'columns' => array(
                'public'    => array('name', 'email', 'updated_at'),
                'private'   => array('password')
            ),
            'limit' => 10,
            'response' => array(
                'access'    => (Profile::auth('id_role') == 1),
                'redirect'  => (Web::url('cms.accounts.admins.profiles') .'?ftr=update&id='. Profile::auth('id_profile'))
            )
        ),

        'insert' => array(
            'response' => array(
                'access'    => (Profile::auth('id_role') == 1),
                'redirect'  => (Web::url('cms.accounts.admins.profiles') .'?ftr=update&id='. Profile::auth('id_profile'))
            )
        )
    ),

    'features' => array(
        'update' => array(
            'response' => array(
                'access' => function (int $id) {
                    return ((Profile::auth('id_role') == 1) || (Profile::auth('id_profile') == $id));
                },
                'redirect' => (Web::url('cms.accounts.admins.profiles') .'?ftr=update&id='. Profile::auth('id_profile'))
            )
        ),

        'delete' => array(

        )
    ),

    'fields' => array(
        'id_role' => array(
            'DB' => array(
                'column'    => 'id_role',
                'type'      => 'int',

                'join'      => array(
                    'table'     => Role::class,
                    'column'    => 'title'
                )
            ),
            'PHP' => array(
                'rules' => array(
                    'insert' => array(
                        "required|int",
                        "inDB:".Role::class
                    ),
                    'update' => array(
                        "required|int",
                        function ($key, $value) {
                            if (Profile::auth('id_role') != 1) {
                                $admin = Profile::get(self::value('id'), "id_role, name");

                                if ($value != $admin->id_role) {
                                    return "{$admin->name}, nu încerca să-ți schimbi drepturile!";
                                }
                            }
                            else {
                                return array(
                                    "inDB:".Role::class,
                                    function ($key, $value) {
                                        if ($value != 1 && !Profile::count("id_role = 1 AND id_profile != ?", array(self::value('id')))) {
                                            return "E nevoie de cel puțin un ". Role::field('title', "id_role = 1");
                                        }
                                    }
                                );
                            }
                        }
                    )
                )
            )
        ),

        'name' => array(
            'DB' => array(
                'column'    => 'name',
                'type'      => 'varchar'
            ),
            'PHP' => array(
                'rules' => array(
                    "required",
                    function ($value) {
                        return trim($value);
                    },
                    "minLength:4"
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

        'password' => array(
            'DB' => array(
                'column'    => 'password',
                'type'      => 'varchar'
            ),
            'PHP' => array(
                'rules' => array(
                    'insert' => array(
                        "required|minLength:8",
                        function ($value) {
                            return password_hash($value, PASSWORD_DEFAULT);
                        }
                    ),
                    'update' => array(
                        function ($key, $value) {
                            if ($value && !trim($value)) {
                                return "Nu doar spațieri";
                            }
                        },
                        function ($value) {
                            if (!trim($value) && !self::error('id')) {
                                return Profile::field('password', 'id_profile = ?', array(self::value('id')));
                            }

                            return password_hash($value, PASSWORD_DEFAULT);
                        }
                    )
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
