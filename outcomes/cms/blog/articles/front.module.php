<?php

use Arshwell\Monolith\Web;

use Arshavinel\ElleTherapy\Table\Article;

return array(
    'breadcrumbs' => array(
        'Blog',
        'Articole'
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
                    return Arshwell\Monolith\Web::url('site.blog.show', array(
                        'id'    => $id,
                        'slug'  => Article::field('title:lg', "id_article = ?", array($id))
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
                        'url'   => Web::url('cms.ajax.blog.article.visible'),
                        'type'  => 'POST'
                    )
                )
            );

            if (Article::field('visible', "id_article = ?", array($id))) {
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

        'id_category' => array(
            'HTML' => array(
                'label'         => "Categorie",
                'icon'          => 'window-maximize',
                'type'          => 'select'
            )
        ),

        'title' => array(
            'HTML' => array(
                'label'         => "Titlu",
                'icon'          => 'info-circle',
                'type'          => 'text'
            )
        ),

        'description' => array(
            'HTML' => array(
                'label'         => "Conținut",
                'icon'          => 'file-alt',
                'type'          => 'textarea',
                'placeholder'   => "..."
            ),
            'JS' => array(
                'tinymce' => true
            )
        ),

        'seo_title' => array(
            'HTML' => array(
                'label'         => "SEO Titlu",
                'icon'          => 'laptop-code',
                'type'          => 'text'
            )
        ),

        'seo_description' => array(
            'HTML' => array(
                'label'         => "SEO Descriere",
                'icon'          => 'laptop-code',
                'type'          => 'textarea',
                'placeholder'   => "..."
            )
        ),

        'seo_keywords' => array(
            'HTML' => array(
                'label'         => "SEO Keywords",
                'icon'          => 'laptop-code',
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
