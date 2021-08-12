<?php

use Arsh\Core\Meta;
use Arsh\Core\Table\TableValidationResponse;
use Brain\Table\Event\Promo\Discount;

Meta::set('title', "Reduceri");

return array(
    'DB' => array(
        'conn'  => 'default',
        'table' => Discount::class
    ),

    'PHP' => array(
        'validation' => array(
            'class' => Brain\Validation\CMSValidation::class
        )
    ),

    'actions' => array(
        'select' => array(
            'columns' => array(
                'public'    => array('id_meeting', 'title'),
                'private'   => array('seo_title', 'seo_description', 'seo_keywords', 'seo_image')
            ),
            'limit' => 10
        ),
        'insert' => array(
            'hooks' => array(
                'ajax' => function (array $query, TableValidationResponse $form) {
                    if ($form->valid()) {
                        foreach ((Discount::TRANSLATOR)::LANGUAGES as $lg) {
                            Discount::update(
                                array(
                                    'set'   => "slug:lg = ?",
                                    'where' => "id_discount = ?"
                                ),
                                array(':lg' => $lg, Arsh\Core\Text::slug($form->value("data.title.$lg")), $form->value('id'))
                            );
                        }
                    }
                }
            )
        )
    ),

    'features' => array(
        'update' => true,

        'delete' => true
    ),

    'fields' => array(
        'bg_image' => array(
            'DB' => NULL,
            'PHP' => array(
                'rules' => array(
                    'insert' => array(
                        "required|image:Brain\Table\Event\Promo\Discount,bg_image"
                    ),
                    'update' => array(
                        "optional|image:Brain\Table\Event\Promo\Discount,bg_image"
                    )
                )
            )
        ),

        'id_meeting' => array(
            'DB' => array(
                'column'    => 'id_meeting',
                'type'      => 'int',
                'null'      => true,
                'from'      => array(
                    'table'     => Brain\Table\Event\Meeting::class,
                    'column'    => 'title'
                )
            ),
            'PHP' => array(
                'rules' => array(
                    "required|int",
                    "inDB:".Brain\Table\Event\Meeting::class.','.Brain\Table\Event\Meeting::PRIMARY_KEY
                )
            )
        ),

        'slug' => array(
            'DB' => array(
                'column'    => 'slug',
                'type'      => 'varchar',
                'length'    => 250
            )
        ),

        'title' => array(
            'DB' => array(
                'column'    => 'title',
                'type'      => 'varchar',
                'length'    => 250
            ),
            'PHP' => array(
                'rules' => array(
                    "required|minLength:4|maxLength:250"
                )
            )
        ),

        'text' => array(
            'DB' => array(
                'column'    => 'text',
                'type'      => 'text'
            ),
            'PHP' => array(
                'rules' => array(
                    "required|minLength:50|maxLength:1000"
                )
            )
        ),

        'seo_title' => array(
            'DB' => array(
                'column'    => 'seo_title',
                'type'      => 'varchar',
                'length'    => 50
            ),
            'PHP' => array(
                'rules' => array(
                    "required|minLength:5|maxLength:50"
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

        'seo_image' => array(
            'DB' => NULL,
            'PHP' => array(
                'rules' => array(
                    'insert' => array(
                        "required|image:Brain\Table\Event\Promo\Discount,seo_image"
                    ),
                    'update' => array(
                        "optional|image:Brain\Table\Event\Promo\Discount,seo_image"
                    )
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
