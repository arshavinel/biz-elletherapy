<?php

use Arsh\Core\Web;
use Brain\Table\Service;

return array(
    'breadcrumbs' => array(
        'Servicii'
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
                    'icon'  => 'lock',
                    'class' => "btn badge btn-outline-secondary p-2",
                    'type'  => 'submit'
                ),
                'JS' => array(
                    'tooltip' => array(
                        'title'     => 'Fă-l vizibil',
                        'placement' => 'top',
                        'trigger'   => 'hover'
                    ),
                    'ajax' => array(
                        'url'   => Web::url('cms.ajax.service.visible'),
                        'type'  => 'POST'
                    )
                )
            );

            if (Service::field('visible', "id_service = ?", array($id))) {
                $array['HTML']['icon']  = 'eye';
                $array['HTML']['class'] = "btn badge btn-outline-success p-2";

                $array['JS']['tooltip']['title'] = 'Fă-l draft';
            }

            return $array;
        },

        function (string $key, int $id) {
            $array = array(
                'HTML' => array(
                    'icon'  => 'folder-minus',
                    'class' => "btn badge btn-outline-secondary p-2",
                    'type'  => 'submit'
                ),
                'JS' => array(
                    'tooltip' => array(
                        'title'     => 'Fă-i pagină',
                        'placement' => 'top',
                        'trigger'   => 'hover'
                    ),
                    'ajax' => array(
                        'url'   => Web::url('cms.ajax.service.has-page'),
                        'type'  => 'POST'
                    )
                )
            );

            if (Service::field('has_page', "id_service = ?", array($id))) {
                $array['HTML']['icon']  = 'folder-open';
                $array['HTML']['class'] = "btn badge btn-outline-dark p-2";

                $array['JS']['tooltip']['title'] = 'Elimină pagina';
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
        'preview' => array(
            'HTML' => array(
                'label'         => "Imagine",
                'icon'          => 'image',
                'type'          => 'image'
            )
        ),

        'title' => array(
            'HTML' => array(
                'label'         => "Titlu",
                'icon'          => 'info-circle',
                'type'          => 'text',
                'placeholder'   => "titlu"
            )
        ),

        'price' => array(
            'HTML' => array(
                'label'         => "Preț",
                'icon'          => 'tag',
                'type'          => 'text',
                'placeholder'   => "pret"
            )
        ),

        'description' => array(
            'HTML' => array(
                'label'         => "Descriere",
                'icon'          => 'file-alt',
                'type'          => 'textarea',
                'placeholder'   => "...",
            ),
            'JS' => array(
                'tinymce' => true
            )
        ),

        'visible' => array(
            'HTML' => array(
                'label'     => "Vizibil",
                'icon'      => 'eye',
                'type'      => 'checkbox',
                'notes'     => array("Serviciu vizibil în site"),
                'value'     => 1
            )
        ),

        'has_page' => array(
            'HTML' => array(
                'label'     => "Pagină",
                'icon'      => 'folder-open',
                'type'      => 'checkbox',
                'notes'     => array("Are propria pagină"),
                'value'     => 1
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
