<?php

use Brain\Table\CMS\Admin;

return array(
    'breadcrumbs' => array(
        'Admini'
    ),

    'actions' => array(
        'select' => array(
            'HTML' => array(
                'text'      => "Admini",
                'class'     => "btn btn-sm btn-info",
                'hidden'    => function () {
                    return (Admin::auth('id_cms_role') != 1);
                }
            )
        ),

        'insert' => array(
            'HTML'  => array(
                'text'      => "Adaugă",
                'class'     => "btn btn-sm btn-success",
                'hidden'    => function () {
                    return (Admin::auth('id_cms_role') != 1);
                }
            )
        )
    ),

    'features' => array(
        'update' => array(
            'HTML' => array(
                'icon'      => 'edit',
                'class'     => "btn badge btn-outline-info p-2",
                'hidden'    => function () {
                    return (Admin::auth('id_cms_role') != 1);
                }
            ),
            'JS' => array(
                'tooltip' => array(
                    'title'     => 'Editează',
                    'placement' => 'top'
                )
            )
        ),

        'delete' => array(
            'HTML' => array(
                'type'      => 'submit',
                'icon'      => 'trash-alt',
                'class'     => "btn badge btn-outline-danger p-2",
                'hidden'    => function () {
                    return (Admin::auth('id_cms_role') != 1);
                }
            ),
            'JS' => array(
                'confirmation' => array(
                    'title' => 'Vrei să ștergi?'
                )
            )
        )
    ),

    'fields' => array(
        'id_cms_role' => array(
            'HTML' => array(
                'icon'          => 'users-cog',
                'label'         => "Rol",
                'type'          => 'select',
                'readonly'      => function () {
                    return (Admin::auth('id_cms_role') != 1);
                }
            )
        ),

        'name' => array(
            'HTML' => array(
                'icon'          => 'file-signature',
                'label'         => "Nume",
                'type'          => 'text',
                'placeholder'   => "ex: Andrei"
            )
        ),

        'email' => array(
            'HTML' => array(
                'label'         => "Email",
                'icon'          => 'envelope',
                'type'          => 'text',
                'placeholder'   => "ex: andrei.ionescu@yahoo.com"
            ),
        ),

        'password' => array(
            'HTML' => array(
                'icon'          => 'unlock-alt',
                'label'         => "Parolă",
                'notes'         => function () {
                    if (empty($_GET['ctn']) || $_GET['ctn'] != 'insert') {
                        return array("*Completează doar dacă vrei să schimbi parola");
                    }
                    return array();
                },
                'type'          => 'text',
                'placeholder'   => function () {
                    return (empty($_GET['ctn']) || $_GET['ctn'] != 'insert' ? "opțională" : '');
                },
                'value'         => '',
                'overwrite'     => false
            ),
            'JS' => array(
                'update'        => false
            )
        ),

        'inserted_at' => array(
            'HTML' => array(
                'label'         => "Adăugat",
                'type'          => 'date',
                'hidden'        => true
            )
        ),

        'updated_at' => array(
            'HTML' => array(
                'label'         => "Ultima editare",
                'type'          => 'date',
                'hidden'        => true
            )
        )
    )
);
