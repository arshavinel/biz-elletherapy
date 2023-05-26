<?php

use Arshwell\Monolith\Web;

use Arshavinel\ElleTherapy\Table\Industry\Characteristic;

return array(
    'breadcrumbs' => array(
        'Comparare',
        'Caracteristici industrii'
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
        function (string $key, int $id) {
            $array = array(
                'HTML' => array(
                    'icon'  => 'arrow-alt-circle-up',
                    'class' => "btn badge btn-outline-dark p-2",
                    'type'  => 'submit'
                ),
                'JS' => array(
                    'tooltip' => array(
                        'title'     => 'Listată',
                        'placement' => 'top',
                        'trigger'   => 'hover'
                    ),
                    'ajax' => array(
                        'url'   => Web::url('cms.ajax.comparison.characteristics.hidden'),
                        'type'  => 'POST'
                    )
                )
            );

            if (Characteristic::field('hidden', "id_characteristic = ?", array($id))) {
                $array['HTML']['icon']  = 'arrow-alt-circle-down';
                $array['HTML']['class'] = "btn badge btn-outline-secondary p-2";

                $array['JS']['tooltip']['title'] = 'Ascunsă';
            }

            return $array;
        },

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
        ),

        'order' => array(
            'HTML' => array(
                'type'      => 'button',
                'icon'      => 'grip-vertical',
                'class'     => "btn p-0 text-muted"
            ),
            'JS' => array(
                'tooltip' => array(
                    'title'     => 'Ordonează',
                    'placement' => 'top'
                )
            )
        )
    ),

    'fields' => array(
        'id_industry' => array(
            'HTML' => array(
                'label'         => "Industrie",
                'icon'          => 'building',
                'type'          => 'select'
            )
        ),

        'text' => array(
            'HTML' => array(
                'label'         => "Text",
                'icon'          => 'file-alt',
                'type'          => 'textarea',
                'placeholder'   => "..."
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
