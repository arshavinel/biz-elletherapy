<?php

return array(
    'breadcrumbs' => array(
        'Evenimente',
        'Promo',
        'Tombole'
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
        array(
            'HTML' => array(
                'type'  => 'link',
                'href'  => function (string $key, int $id) {
                    $raffle = Arshavinel\ElleTherapy\Table\Event\Promo\Raffle::get($id, "id_meeting, title:lg");
                    $meeting = Arshavinel\ElleTherapy\Table\Event\Meeting::field('title:lg', "id_meeting = ?", array($raffle->id_meeting));

                    return Arshwell\Monolith\Web::url('site.events.promo.raffle', array(
                        'meeting'   => $meeting,
                        'raffle'    => $raffle->translation('title')
                    ));
                },
                'target'    => '_blank',
                'icon'      => 'share',
                'class'     => "btn badge btn-outline-secondary p-2"
            ),
            'JS' => array(
                'tooltip' => array(
                    'title'     => 'Vezi în site',
                    'placement' => 'top'
                )
            )
        ),

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
        'bg_image' => array(
            'HTML' => array(
                'label'         => "Background",
                'icon'          => 'laptop-code',
                'type'          => 'image',
                'required'      => true
            )
        ),

        'id_meeting' => array(
            'HTML' => array(
                'label'         => "Meeting",
                'icon'          => 'window-maximize',
                'type'          => 'select',
                'required'      => true
            )
        ),

        'winner' => array(
            'HTML' => array(
                'label'         => "Câștigător",
                'icon'          => 'trophy',
                'type'          => 'select',
                'notes'         => array("Email-ul câștigătorului")
            )
        ),

        'slug' => array(
            'HTML' => array(
                'label'         => "Slug",
                'icon'          => 'paperclip',
                'type'          => 'text',
                'readonly'      => true,
                'notes'         => array("Placeholder-ul folosit în link-uri")
            )
        ),

        'title' => array(
            'HTML' => array(
                'label'         => "Titlu",
                'icon'          => 'info-circle',
                'type'          => 'text',
                'placeholder'   => "titlu",
                'notes'         => array("Strict ce poți câștiga"),
                'required'      => true
            )
        ),

        'text' => array(
            'HTML' => array(
                'label'         => "Text",
                'icon'          => 'file-alt',
                'type'          => 'textarea',
                'notes'         => array("Aflat deasupra input-ului de email"),
                'placeholder'   => "...",
                'required'      => true
            ),
            'JS' => array(
                'tinymce' => true
            )
        ),

        'seo_title' => array(
            'HTML' => array(
                'label'         => "SEO Titlu",
                'icon'          => 'laptop-code',
                'type'          => 'text',
                'required'      => true
            )
        ),

        'seo_description' => array(
            'HTML' => array(
                'label'         => "SEO Descriere",
                'icon'          => 'laptop-code',
                'type'          => 'textarea',
                'placeholder'   => "...",
                'required'      => true
            )
        ),

        'seo_keywords' => array(
            'HTML' => array(
                'label'         => "SEO Keywords",
                'icon'          => 'laptop-code',
                'type'          => 'textarea',
                'placeholder'   => "...",
                'required'      => true
            )
        ),

        'seo_image' => array(
            'HTML' => array(
                'label'         => "SEO Imagine",
                'icon'          => 'laptop-code',
                'type'          => 'image',
                'required'      => true
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
