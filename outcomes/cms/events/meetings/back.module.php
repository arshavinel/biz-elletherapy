<?php

use Arshwell\Monolith\Meta;
use Arshwell\Monolith\Table\TableValidationResponse;

use Arshavinel\ElleTherapy\Table\Event\Meeting;

Meta::set('title', 'Întâlniri evenimente');

return array(
    'DB' => array(
        'conn'  => 'elletherapy',
        'table' => Meeting::class
    ),

    'PHP' => array(
        'validation' => array(
            'class' => Arshavinel\ElleTherapy\Validation\CMSValidation::class
        )
    ),

    'actions' => array(
        'select' => array(
            'columns' => array(
                'public' => array('id_group', 'title')
            ),
            'limit' => 10
        ),
        'insert' => array(
            'hooks' => array(
                'ajax' => function (array $query, TableValidationResponse $form) {
                    if ($form->valid()) {
                        foreach ((Meeting::TRANSLATOR)::LANGUAGES as $lg) {
                            Meeting::update(
                                array(
                                    'set'   => "slug:lg = ?",
                                    'where' => "id_meeting = ?"
                                ),
                                array(':lg' => $lg, Arshwell\Monolith\Text::slug($form->value("data.title.$lg")), $form->value('id'))
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
        'id_group' => array(
            'DB' => array(
                'column'    => 'id_group',
                'type'      => 'int',
                'null'      => true,

                'join'      => array(
                    'table'     => Arshavinel\ElleTherapy\Table\Event\Group::class,
                    'column'    => 'title'
                )
            ),
            'PHP' => array(
                'rules' => array(
                    "optional|int",
                    "inDB:".Arshavinel\ElleTherapy\Table\Event\Group::class.','.Arshavinel\ElleTherapy\Table\Event\Group::PRIMARY_KEY
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
