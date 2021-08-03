<?php

return array(
    'breadcrumbs' => array(
        'Evenimente',
        'Promo',
        'Tombole',
        'Aplicări'
    ),

    'actions' => array(
        'select' => array(
            'HTML' => array(
                'text'  => "Înregistrări",
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
        'id_raffle' => array(
            'HTML' => array(
                'label'         => "Tombolă",
                'icon'          => 'window-maximize',
                'type'          => 'select',
                'required'      => true
            )
        ),

        'name' => array(
            'HTML' => array(
                'label'         => "Nume",
                'icon'          => 'file-signature',
                'type'          => 'text',
                'placeholder'   => "ex: Maria Ionescu",
                'required'      => true
            )
        ),

        'phone' => array(
            'HTML' => array(
                'label'         => "Telefon",
                'icon'          => 'phone-square-alt',
                'type'          => 'text',
                'placeholder'   => "ex: +40712 345 678"
            ),
        ),

        'email' => array(
            'HTML' => array(
                'label'         => "Email",
                'icon'          => 'info-circle',
                'type'          => 'text',
                'placeholder'   => "email"
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
