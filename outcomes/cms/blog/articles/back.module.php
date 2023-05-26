<?php

use Arshwell\Monolith\Meta;

Meta::set('title', 'Articole');

return array(
    'DB' => array(
        'conn'  => 'elletherapy',
        'table' => Arshavinel\ElleTherapy\Table\Article::class
    ),

    'PHP' => array(
        'validation' => array(
            'class' => Arshavinel\ElleTherapy\Validation\CMSValidation::class
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
                        "required|image:Arshavinel\ElleTherapy\Table\Article,preview"
                    ),
                    'update' => array(
                        "optional|image:Arshavinel\ElleTherapy\Table\Article,preview"
                    )
                )
            )
        ),

        'id_category' => array(
            'DB' => array(
                'column'    => 'id_category',
                'type'      => 'int',

                'join'      => array(
                    'table'     => Arshavinel\ElleTherapy\Table\Article\Category::class,
                    'column'    => 'title'
                )
            ),
            'PHP' => array(
                'rules' => array(
                    "required|int",
                    "inDB:".Arshavinel\ElleTherapy\Table\Article\Category::class.','.Arshavinel\ElleTherapy\Table\Article\Category::PRIMARY_KEY
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
