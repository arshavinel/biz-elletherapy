<?php

use Arsh\Core\Meta;
use Arsh\Core\Web;
use Brain\Table\CMS\Admin;
use Brain\Table\CMS\Role;

Meta::set('title', 'Admini');

return array(
    'DB' => array(
        'conn'  => 'default',
        'table' => Admin::class
    ),

    'PHP' => array(
        'validation' => array(
            'class' => Brain\Validation\CMSValidation::class
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
                'access'    => (Admin::auth('id_cms_role') == 1),
                'redirect'  => (Web::url('cms.admins') .'?ftr=update&id='. Admin::auth('id_cms_admin'))
            )
        ),

        'insert' => array(
            'response' => array(
                'access'    => (Admin::auth('id_cms_role') == 1),
                'redirect'  => (Web::url('cms.admins') .'?ftr=update&id='. Admin::auth('id_cms_admin'))
            )
        )
    ),

    'features' => array(
        'update' => array(
            'response' => array(
                'access' => function (int $id) {
                    return ((Admin::auth('id_cms_role') == 1) || (Admin::auth('id_cms_admin') == $id));
                },
                'redirect' => (Web::url('cms.admins') .'?ftr=update&id='. Admin::auth('id_cms_admin'))
            )
        ),

        'delete' => array(

        )
    ),

    'fields' => array(
        'id_cms_role' => array(
            'DB' => array(
                'column'    => 'id_cms_role',
                'type'      => 'int',
                'from'      => array(
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
                            if (Admin::auth('id_cms_role') != 1) {
                                $admin = Admin::get(self::value('id'), "id_cms_role, name");

                                if ($value != $admin->id_cms_role) {
                                    return "{$admin->name}, nu încerca să-ți schimbi drepturile!";
                                }
                            }
                            else {
                                return array(
                                    "inDB:".Role::class,
                                    function ($key, $value) {
                                        if ($value != 1 && !Admin::count("id_cms_role = 1 AND id_cms_admin != ?", array(self::value('id')))) {
                                            return "E nevoie de cel puțin un ". Role::field('title', "id_cms_role = 1");
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
                                return Admin::field('password', 'id_cms_admin = ?', array(self::value('id')));
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
