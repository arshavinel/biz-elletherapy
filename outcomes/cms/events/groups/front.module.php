<?php

return array(
    'breadcrumbs' => array(
        'Evenimente',
        'Serii'
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
        'title' => array(
            'HTML' => array(
                'label'         => "Titlu",
                'icon'          => 'info-circle',
                'type'          => 'text',
                'placeholder'   => "titlu"
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
