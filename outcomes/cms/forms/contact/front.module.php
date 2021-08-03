<?php

return array(
    'breadcrumbs' => array(
        'Formulare contact'
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
        'name' => array(
            'HTML' => array(
                'label'         => "Nume",
                'icon'          => 'file-signature',
                'type'          => 'text',
                'placeholder'   => "Marcel"
            ),
        ),

        'email' => array(
            'HTML' => array(
                'label'         => "Email",
                'icon'          => 'envelope',
                'type'          => 'text',
                'placeholder'   => "marcel@yahoo.com"
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
