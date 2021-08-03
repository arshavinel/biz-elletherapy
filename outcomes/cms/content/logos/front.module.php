<?php

use App\Core\Web;
use App\Tables\Logo;

return array(
    'breadcrumbs' => array(
        'Conținut',
        'Logo-uri'
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
                        'url'   => Web::url('cms.content.ajax.logos.visible'),
                        'type'  => 'POST'
                    )
                )
            );

            if (Logo::field('visible', "id_logo = ?", array($id))) {
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
        )
    ),

    'fields' => array(
        'favicon_cms' => array(
            'HTML' => array(
                'wrappers'  => array(
                    "col-12 col-sm-4 col-md-3 col-xl-2",
                    "col-12 col-sm-8 col-md-9 col-xl-4"
                ),
                'label'     => "Favicon CMS",
                'icon'      => 'image',
                'type'      => 'image'
            )
        ),

        'favicon_site' => array(
            'HTML' => array(
                'wrappers'  => array(
                    "col-12 col-sm-4 col-md-3 col-xl-2",
                    "col-12 col-sm-8 col-md-9 col-xl-4"
                ),
                'label'     => "Favicon site",
                'icon'      => 'image',
                'type'      => 'image'
            )
        ),

        'header' => array(
            'HTML' => array(
                'label'     => "Logo header",
                'icon'      => 'image',
                'type'      => 'image'
            )
        ),

        'useful' => array(
            'HTML' => array(
                'label'     => "Logo folositor",
                'icon'      => 'image',
                'type'      => 'image',
                'notes'     => array("Folositor precum la mentenanță")
            )
        ),

        'visible' => array(
            'HTML' => array(
                'type'      => 'number',
                'hidden'    => true
            )
        ),

        'inserted_at' => array(
            'HTML' => array(
                'label'     => "Adăugat",
                'type'      => 'date',
                'hidden'    => true
            )
        ),

        'updated_at' => array(
            'HTML' => array(
                'label'     => "Ultima editare",
                'type'      => 'date',
                'hidden'    => true
            )
        )
    )
);
