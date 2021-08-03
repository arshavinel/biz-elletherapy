<div class="row">
    <?= App\Core\Module\HTML\Piece::actions(
        array(
            'Conținut',
            'Pagini',
            App\Views\CMS::sentence('route.'. $source, NULL, true),
            App\Core\Module\HTML\Action::link(4, array(
                'HTML' => array(
                    'href'  => call_user_func(function () use ($source) {
                        $source = App\Views\Site::get(App\Core\Web::param('id'), 'source')->source;

                        if (App\Core\Web::exists($source)) {
                            return App\Core\Web::url($source);
                        }

                        return '#';
                    }),
                    'target'    => '_blank',
                    'icon'      => 'share',
                    'class'     => "btn badge btn-outline-secondary p-2",
                    'title'     => "Vezi pagina"
                )
            ))
        ),
        array(
            array(
                'HTML' => array(
                    'text'  => 'Pagini',
                    'type'  => 'link',
                    'href'  => App\Core\Web::url('cms.content.views.pages.all'),
                    'class' => "btn btn-sm btn-info"
                )
            )
        )
    ) ?>
</div>

<div class="arshmodule">
    <form method="POST" class="arshmodule-form" action="<?= App\Core\Web::url('cms.content.views.ajax.update') ?>">
        <input type="hidden" name="global" value="0" />
        <input type="hidden" name="source" value="<?= $source ?>" />

        <div class="row">
            <div class="col-lg-8">
                <?php
                if ($view['fields']) { ?>
                    <div class="card margin-0-2nd">
                        <div class="card-header">
                            <b>Conținut</b>
                            <?php
                            if (App\Views\Site::isTranslated()) { ?>
                                <div style="position: absolute; right: 15px; top: 0;">
                                    <?= App\Core\Module\HTML\Piece::languages(
                                        (App\Views\Site::TRANSLATOR)::LANGUAGES,
                                        (App\Views\Site::TRANSLATOR)::LANGUAGES[0],
                                        false
                                    ) ?>
                                </div>
                            <?php } ?>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <?php
                                foreach ($view['fields'] as $i => $field) {
                                    switch ($field->type) {
                                        case App\Views\Site::TYPES['sentence']:
                                        case App\Views\Site::TYPES['text']:
                                        case App\Views\Site::TYPES['content']: {
                                            echo App\Core\Module\HTML\Piece::field(
                                                'value',
                                                array(
                                                    'HTML' => array(
                                                        'label' => $field->info,
                                                        'type'  => function () use ($field) {
                                                            switch ($field->type) {
                                                                case App\Views\Site::TYPES['sentence']: {
                                                                    return 'text';
                                                                }
                                                                case App\Views\Site::TYPES['text']: {
                                                                    return 'textarea';
                                                                }
                                                                case App\Views\Site::TYPES['content']: {
                                                                    return 'textarea';
                                                                }
                                                            }
                                                        },
                                                        'id'        => "field-$i",
                                                        'name'      => "data[$field->type][$field->info]",
                                                        'notes'     => function () use ($field) {
                                                            $notes = array();

                                                            if ($field->vars) {
                                                                $notes[] = call_user_func(function () use ($field) {
                                                                    ob_start(); ?>
                                                                        Primește
                                                                        <u data-toggle="tooltip" data-placement="left" data-html="true"
                                                                        title="<span style='font-size: smaller'>Placeholders:<br><?= implode(', ', array_map(function($key){return'{$'.$key.'}';},range(1, $field->vars))) ?></span>">
                                                                            <?= ($field->vars == 1 ? "o variabilă" : "{$field->vars} variabile") ?>
                                                                        </u>
                                                                    <?php
                                                                    return ob_get_clean();
                                                                });
                                                            }

                                                            return $notes;
                                                        }
                                                    ),
                                                    'JS' => array(
                                                        'tinymce' => function () use ($field) {
                                                            return ($field->type == App\Views\Site::TYPES['content']);
                                                        }
                                                    )
                                                ),
                                                new App\Core\Table\TableField(get_class($field), $field->id(), 'value'),
                                                (($field)::TRANSLATOR)::LANGUAGES
                                            );
                                            break;
                                        }
                                        case App\Views\Site::TYPES['image']:
                                        case App\Views\Site::TYPES['images']:
                                        case App\Views\Site::TYPES['video']: {
                                            echo App\Core\Module\HTML\Piece::field(
                                                'value',
                                                array(
                                                    'HTML' => array(
                                                        'label' => $field->info,
                                                        'type'  => function () use ($field) {
                                                            switch ($field->type) {
                                                                case App\Views\Site::TYPES['image']: {
                                                                    return 'image';
                                                                }
                                                                case App\Views\Site::TYPES['images']: {
                                                                    return 'images';
                                                                }
                                                                case App\Views\Site::TYPES['video']: {
                                                                    return 'video';
                                                                }
                                                            }
                                                        },
                                                        'id'        => "field-$i",
                                                        'name'      => "data[$field->type][$field->info]"
                                                    )
                                                ),
                                                call_user_func(function () use ($field) {
                                                    switch ($field->type) {
                                                        case App\Views\Site::TYPES['image']: {
                                                            return new App\Core\Table\Files\Image(get_class($field), $field->id(), 'value');
                                                        }
                                                        case App\Views\Site::TYPES['images']: {
                                                            return new App\Core\Table\Files\ImageGroup(get_class($field), $field->id(), 'value');
                                                        }
                                                        case App\Views\Site::TYPES['video']: {
                                                            return new App\Core\Table\Files\Doc(get_class($field), $field->id(), 'value');
                                                        }
                                                    }
                                                }),
                                                (($field)::TRANSLATOR)::LANGUAGES
                                            );
                                            break;
                                        }
                                        case App\Views\Site::TYPES['checked']: {
                                            echo App\Core\Module\HTML\Piece::field(
                                                'value',
                                                array(
                                                    'HTML' => array(
                                                        'label'     => $field->info,
                                                        'type'      => 'radio',
                                                        'id'        => "field-$i",
                                                        'name'      => "data[$field->type][$field->info]",
                                                        'values'    => array(
                                                            '0' => 'Nu',
                                                            '1' => 'Da'
                                                        )
                                                    )
                                                ),
                                                new App\Core\Table\TableField(get_class($field), $field->id(), 'value'),
                                                (($field)::TRANSLATOR)::LANGUAGES
                                            );
                                            break;
                                        }
                                    }
                                } ?>
                            </div>
                        </div>
                    </div>
                <?php }

                if ($view['SEO']) { ?>
                    <div class="card margin-0-2nd">
                        <div class="card-header">
                            <b>SEO</b>
                            <?php
                            if (App\Views\Site::isTranslated()) { ?>
                                <div style="position: absolute; right: 15px; top: 0;">
                                    <?= App\Core\Module\HTML\Piece::languages(
                                        (($field)::TRANSLATOR)::LANGUAGES,
                                        (($field)::TRANSLATOR)::LANGUAGES[0],
                                        false
                                    ) ?>
                                </div>
                            <?php } ?>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <?php
                                foreach ($view['SEO'] as $i => $field) {
                                    switch ($field->type) {
                                        case App\Views\Site::TYPES['sentenceSEO']:
                                        case App\Views\Site::TYPES['textSEO']: {
                                            echo App\Core\Module\HTML\Piece::field(
                                                'value',
                                                array(
                                                    'HTML' => array(
                                                        'label' => $field->info,
                                                        'type'  => function () use ($field) {
                                                            switch ($field->type) {
                                                                case App\Views\Site::TYPES['sentenceSEO']: {
                                                                    return 'text';
                                                                }
                                                                case App\Views\Site::TYPES['textSEO']: {
                                                                    return 'textarea';
                                                                }
                                                            }
                                                        },
                                                        'id'        => "field-$i",
                                                        'name'      => "data[$field->type][$field->info]",
                                                        'notes'     => function () use ($field) {
                                                            $notes = array();

                                                            if ($field->vars) {
                                                                $notes[] = call_user_func(function () use ($field) {
                                                                    ob_start(); ?>
                                                                        Primește
                                                                        <u data-toggle="tooltip" data-placement="left" data-html="true"
                                                                        title="<span style='font-size: smaller'>Placeholders:<br><?= implode(', ', array_map(function($key){return'{$'.$key.'}';},range(1, $field->vars))) ?></span>">
                                                                            <?= ($field->vars == 1 ? "o variabilă" : "{$field->vars} variabile") ?>
                                                                        </u>
                                                                    <?php
                                                                    return ob_get_clean();
                                                                });
                                                            }

                                                            return $notes;
                                                        }
                                                    )
                                                ),
                                                new App\Core\Table\TableField(get_class($field), $field->id(), 'value'),
                                                (($field)::TRANSLATOR)::LANGUAGES
                                            );
                                            break;
                                        }
                                        case App\Views\Site::TYPES['imageSEO']: {
                                            echo App\Core\Module\HTML\Piece::field(
                                                'value',
                                                array(
                                                    'HTML' => array(
                                                        'label' => $field->info,
                                                        'type'  => 'image',
                                                        'id'    => "field-$i",
                                                        'name'  => "data[$field->type][$field->info]"
                                                    )
                                                ),
                                                new App\Core\Table\Files\Image(get_class($field), $field->id(), 'value'),
                                                (($field)::TRANSLATOR)::LANGUAGES
                                            );
                                            break;
                                        }
                                    }
                                } ?>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </div>
            <div class="col-lg-4">
                <?= App\Core\Module\HTML\Piece::saver(array()) ?>
            </div>
        </div>
    </form>

    <?= App\Core\Module\HTML\Piece::dialog() ?>
</div>
