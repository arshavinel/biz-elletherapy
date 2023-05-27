<?php

use Arshwell\Monolith\Web;

use Arshavinel\ElleTherapy\Table\SocialMedia;

return array(
    'breadcrumbs' => array(
        'Conținut',
        'Social Media'
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
                        'title'     => 'Fă-le vizibile',
                        'placement' => 'top',
                        'trigger'   => 'hover'
                    ),
                    'ajax' => array(
                        'url'   => Web::url('cms.ajax.content.social-media.visible'),
                        'type'  => 'POST'
                    )
                )
            );

            if (SocialMedia::field('visible', "id_media = ?", array($id))) {
                $array['HTML']['icon']  = 'eye';
                $array['HTML']['class'] = "btn badge btn-outline-success p-2";

                $array['JS']['tooltip']['title'] = 'Ascunde';
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
        'icon' => array(
            'HTML' => array(
                'label'         => "Iconiță",
                'icon'          => 'image',
                'type'          => 'image'
            )
        ),

        'link' => array(
            'HTML' => array(
                'label'         => "Link",
                'icon'          => 'link',
                'type'          => 'text'
            )
        ),

        'text' => array(
            'HTML' => array(
                'label'         => "Text",
                'icon'          => 'file-alt',
                'type'          => 'text'
            )
        ),

        'visible' => array(
            'HTML' => array(
                'label'     => "Activă",
                'icon'      => 'eye',
                'type'      => 'checkbox',
                'notes'     => array("Vizibilă pe site"),
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
