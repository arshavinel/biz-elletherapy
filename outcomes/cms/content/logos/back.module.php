<?php

use App\Core\Meta;

Meta::set('title', 'Logo-uri');

return array(
    'DB' => array(
        'conn'  => 'default',
        'table' => App\Tables\Logo::class
    ),

    'PHP' => array(
        'validation' => array(
            'class' => App\Validations\CMSValidation::class
        )
    ),

    'actions' => array(
        'select' => array(
            'columns' => array(
                'public'    => array('favicon_site', 'header'),
                'private'   => array('visible')
            ),
            'limit' => 10
        ),
        'insert' => true
    ),

    'features' => array(
        'update' => true,

        'delete' => true
    ),

    'fields' => array(
        'favicon_cms' => array(
            'DB' => NULL,
            'PHP' => array(
                'rules' => array(
                    'insert' => array(
                        "required|image:App\Tables\Logo,favicon_cms"
                    ),
                    'update' => array(
                        "optional|image:App\Tables\Logo,favicon_cms"
                    )
                )
            )
        ),

        'favicon_site' => array(
            'DB' => NULL,
            'PHP' => array(
                'rules' => array(
                    'insert' => array(
                        "required|image:App\Tables\Logo,favicon_site"
                    ),
                    'update' => array(
                        "optional|image:App\Tables\Logo,favicon_site"
                    )
                )
            )
        ),

        'header' => array(
            'DB' => NULL,
            'PHP' => array(
                'rules' => array(
                    'insert' => array(
                        "required|image:App\Tables\Logo,header"
                    ),
                    'update' => array(
                        "optional|image:App\Tables\Logo,header"
                    )
                )
            )
        ),

        'useful' => array(
            'DB' => NULL,
            'PHP' => array(
                'rules' => array(
                    'insert' => array(
                        "required|image:App\Tables\Logo,useful"
                    ),
                    'update' => array(
                        "optional|image:App\Tables\Logo,useful"
                    )
                )
            )
        ),

        'visible' => array(
            'DB' => array(
                'column'    => 'visible',
                'type'      => 'tinyint',
                'default'   => 0
            ),
            'PHP' => array(
                'rules' => array(
                    function ($value) {
                        return (int)$value;
                    }
                )
            )
        ),

        'inserted_at' => array(
            'DB' => array(
                'column'    => 'inserted_at',
                'type'      => 'int'
            ),
            'PHP' => array(
                'rules' => array(
                    'insert' => array(
                        function ($value) {
                            return time();
                        }
                    ),
                    'update' => array(
                        function ($value) {
                            return strtotime($value);
                        }
                    )
                )
            )
        ),

        'updated_at' => array(
            'DB' => array(
                'column'    => 'updated_at',
                'type'      => 'int',
                'null'      => true
            ),
            'PHP' => array(
                'rules' => array(
                    'insert' => array(
                        function ($value) {
                            return NULL;
                        }
                    ),
                    'update' => array(
                        function ($value) {
                            return time();
                        }
                    )
                )
            )
        ),
    )
);
