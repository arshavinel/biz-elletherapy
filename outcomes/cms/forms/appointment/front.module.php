<?php

return array(
    'breadcrumbs' => array(
        'Formulare programări'
    ),

    'actions' => array(
        'select' => array(
            'HTML' => array(
                'text'  => "Vizualizare",
                'class' => "btn btn-sm btn-info"
            )
        ),
        'insert' => array(
            'HTML'  => array(
                'text'  => "Adaugă",
                'class' => "btn btn-sm btn-success"
            )
        )
    ),

    'features' => array(
        'update' => array(
            'HTML' => array(
                'icon'      => 'edit',
                'class'     => "btn badge btn-outline-info p-2"
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
                'class'     => "btn badge btn-outline-danger p-2"
            ),
            'JS' => array(
                'confirmation' => array(
                    'title' => 'Vrei să ștergi?'
                )
            )
        )
    ),

    'fields' => array(
        'firstname' => array(
            'HTML' => array(
                'label'         => "Prenume",
                'icon'          => 'file-signature',
                'type'          => 'text',
                'placeholder'   => "ex: Marcel"
            ),
        ),

        'lastname' => array(
            'HTML' => array(
                'label'         => "Nume",
                'icon'          => 'file-signature',
                'type'          => 'text',
                'placeholder'   => "ex: Ionescu"
            ),
        ),

        'email' => array(
            'HTML' => array(
                'label'         => "Email",
                'icon'          => 'envelope',
                'type'          => 'text',
                'placeholder'   => "ex: marcel.ionescu@yahoo.com"
            ),
        ),

        'phone' => array(
            'HTML' => array(
                'label'         => "Telefon",
                'icon'          => 'phone-square-alt',
                'type'          => 'text',
                'placeholder'   => "+40712 345 678"
            ),
        ),

        'id_service' => array(
            'HTML' => array(
                'label'         => "Serviciu",
                'icon'          => 'clipboard-list',
                'type'          => 'select'
            ),
        ),

        'date' => array(
            'HTML' => array(
                'label'         => "Dată",
                'icon'          => 'calendar-check',
                'type'          => 'date',
                'value'         => time()
            ),
            'JS' => array(
                'update'        => false
            )
        ),

        'message' => array(
            'HTML' => array(
                'label'         => "Mesaj",
                'icon'          => 'comment-dots',
                'type'          => 'textarea',
                'placeholder'   => "..."
            ),
        ),

        'inserted_at' => array(
            'HTML' => array(
                'label'         => "Adăugat",
                'type'          => 'date',
                'hidden'        => true
            )
        ),
    )
);
