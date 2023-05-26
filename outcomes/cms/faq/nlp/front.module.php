<?php

use Arshwell\Monolith\Web;

use Arshavinel\ElleTherapy\Table\NLP\FAQ;

return array(
    'breadcrumbs' => array(
        'FAQ',
        'NLP'
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
                        'url'   => Web::url('cms.ajax.faq.nlp.visible'),
                        'type'  => 'POST'
                    )
                )
            );

            if (FAQ::field('visible', "id_faq = ?", array($id))) {
                $array['HTML']['icon']  = 'eye';
                $array['HTML']['class'] = "btn badge btn-outline-success p-2";

                $array['JS']['tooltip']['title'] = 'Fă-l draft';
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
        'question' => array(
            'HTML' => array(
                'label'         => "Întrebare",
                'icon'          => 'question-circle',
                'type'          => 'text',
                'placeholder'   => "întrebare des întâlnită"
            )
        ),

        'answer' => array(
            'HTML' => array(
                'label'         => "Răspuns",
                'icon'          => 'file-alt',
                'type'          => 'textarea',
                'placeholder'   => "cel mai bun răspuns...",
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
                'notes'     => array("Întrebare vizibilă în site"),
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
