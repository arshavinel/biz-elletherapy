<?php

use App\Core\Meta;

Meta::set('title', 'Articole');

return array(
    'DB' => array(
        'conn'  => 'default',
        'table' => App\Tables\Article::class
    ),

    'PHP' => array(
        'validation' => array(
            'class' => App\Validations\CMSValidation::class
        )
    ),

    'actions' => array(
        'select' => array(
            'columns' => array(
                'public'    => array('id_category', 'title'),
                'private'   => array('seo_title', 'seo_description', 'seo_keywords')
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
        'preview' => array(
            'DB' => NULL,
            'PHP' => array(
                'rules' => array(
                    'insert' => array(
                        "required|image:App\Tables\Article,preview"
                    ),
                    'update' => array(
                        "optional|image:App\Tables\Article,preview"
                    )
                )
            )
        ),

        'id_category' => array(
            'DB' => array(
                'column'    => 'id_category',
                'type'      => 'int',
                'from'      => array(
                    'table'     => App\Tables\Article\Category::class,
                    'column'    => 'title'
                )
            ),
            'PHP' => array(
                'rules' => array(
                    "required|int",
                    "inDB:".App\Tables\Article\Category::class.','.App\Tables\Article\Category::PRIMARY_KEY
                )
            )
        ),

        'title' => array(
            'DB' => array(
                'column'    => 'title',
                'type'      => 'varchar'
            ),
            'PHP' => array(
                'rules' => array(
                    "required|minLength:10"
                )
            )
        ),

        'description' => array(
            'DB' => array(
                'column'    => 'description',
                'type'      => 'text'
            ),
            'PHP' => array(
                'rules' => array(
                    "required|minLength:50"
                )
            )
        ),

        'seo_title' => array(
            'DB' => array(
                'column'    => 'seo_title',
                'type'      => 'varchar'
            ),
            'PHP' => array(
                'rules' => array(
                    "required|minLength:10"
                )
            )
        ),

        'seo_description' => array(
            'DB' => array(
                'column'    => 'seo_description',
                'type'      => 'text'
            ),
            'PHP' => array(
                'rules' => array(
                    "required|minLength:25"
                )
            )
        ),

        'seo_keywords' => array(
            'DB' => array(
                'column'    => 'seo_keywords',
                'type'      => 'text'
            ),
            'PHP' => array(
                'rules' => array(
                    "required|minLength:25"
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
