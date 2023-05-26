<div class="row">
    <?= Arshwell\Monolith\Module\HTML\Piece::actions(
        array(
            'Conținut',
            'Pagini',
            Arshavinel\ElleTherapy\View\CMS::sentence('route.'. $source, NULL, true),
            Arshwell\Monolith\Module\HTML\Action::link(4, array(
                'HTML' => array(
                    'href'  => call_user_func(function () use ($source) {
                        $source = Arshavinel\ElleTherapy\View\Site::get(Arshwell\Monolith\Web::param('id'), 'source')->source;

                        if (Arshwell\Monolith\Web::exists($source)) {
                            return Arshwell\Monolith\Web::url($source);
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
                    'href'  => Arshwell\Monolith\Web::url('cms.content.views.pages.all'),
                    'class' => "btn btn-sm btn-info"
                )
            )
        )
    ) ?>
</div>

<div class="arshmodule">
    <form method="POST" class="arshmodule-form" action="<?= Arshwell\Monolith\Web::url('cms.content.views.ajax.update') ?>">
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
                            if (Arshavinel\ElleTherapy\View\Site::translationTimes() > 1) { ?>
                                <div style="position: absolute; right: 15px; top: 0;">
                                    <?= Arshwell\Monolith\Module\HTML\Piece::languages(
                                        (Arshavinel\ElleTherapy\View\Site::TRANSLATOR)::LANGUAGES,
                                        (Arshavinel\ElleTherapy\View\Site::TRANSLATOR)::LANGUAGES[0],
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
                                        case Arshavinel\ElleTherapy\View\Site::TYPES['sentence']:
                                        case Arshavinel\ElleTherapy\View\Site::TYPES['text']:
                                        case Arshavinel\ElleTherapy\View\Site::TYPES['content']: {
                                            echo Arshwell\Monolith\Module\HTML\Piece::field(
                                                'value',
                                                array(
                                                    'HTML' => array(
                                                        'label' => $field->info,
                                                        'type'  => function () use ($field) {
                                                            switch ($field->type) {
                                                                case Arshavinel\ElleTherapy\View\Site::TYPES['sentence']: {
                                                                    return 'text';
                                                                }
                                                                case Arshavinel\ElleTherapy\View\Site::TYPES['text']: {
                                                                    return 'textarea';
                                                                }
                                                                case Arshavinel\ElleTherapy\View\Site::TYPES['content']: {
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
                                                            return ($field->type == Arshavinel\ElleTherapy\View\Site::TYPES['content']);
                                                        }
                                                    )
                                                ),
                                                new Arshwell\Monolith\Table\TableField(get_class($field), $field->id(), 'value'),
                                                (($field)::TRANSLATOR)::LANGUAGES
                                            );
                                            break;
                                        }
                                        case Arshavinel\ElleTherapy\View\Site::TYPES['image']:
                                        case Arshavinel\ElleTherapy\View\Site::TYPES['images']:
                                        case Arshavinel\ElleTherapy\View\Site::TYPES['video']: {
                                            echo Arshwell\Monolith\Module\HTML\Piece::field(
                                                'value',
                                                array(
                                                    'HTML' => array(
                                                        'label' => $field->info,
                                                        'type'  => function () use ($field) {
                                                            switch ($field->type) {
                                                                case Arshavinel\ElleTherapy\View\Site::TYPES['image']: {
                                                                    return 'image';
                                                                }
                                                                case Arshavinel\ElleTherapy\View\Site::TYPES['images']: {
                                                                    return 'images';
                                                                }
                                                                case Arshavinel\ElleTherapy\View\Site::TYPES['video']: {
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
                                                        case Arshavinel\ElleTherapy\View\Site::TYPES['image']: {
                                                            return new Arshwell\Monolith\Table\Files\Image(get_class($field), $field->id(), 'value');
                                                        }
                                                        case Arshavinel\ElleTherapy\View\Site::TYPES['images']: {
                                                            return new Arshwell\Monolith\Table\Files\ImageGroup(get_class($field), $field->id(), 'value');
                                                        }
                                                        case Arshavinel\ElleTherapy\View\Site::TYPES['video']: {
                                                            return new Arshwell\Monolith\Table\Files\Doc(get_class($field), $field->id(), 'value');
                                                        }
                                                    }
                                                }),
                                                (($field)::TRANSLATOR)::LANGUAGES
                                            );
                                            break;
                                        }
                                        case Arshavinel\ElleTherapy\View\Site::TYPES['checked']: {
                                            echo Arshwell\Monolith\Module\HTML\Piece::field(
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
                                                new Arshwell\Monolith\Table\TableField(get_class($field), $field->id(), 'value'),
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
                            if (Arshavinel\ElleTherapy\View\Site::translationTimes() > 1) { ?>
                                <div style="position: absolute; right: 15px; top: 0;">
                                    <?= Arshwell\Monolith\Module\HTML\Piece::languages(
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
                                        case Arshavinel\ElleTherapy\View\Site::TYPES['sentenceSEO']:
                                        case Arshavinel\ElleTherapy\View\Site::TYPES['textSEO']: {
                                            echo Arshwell\Monolith\Module\HTML\Piece::field(
                                                'value',
                                                array(
                                                    'HTML' => array(
                                                        'label' => $field->info,
                                                        'type'  => function () use ($field) {
                                                            switch ($field->type) {
                                                                case Arshavinel\ElleTherapy\View\Site::TYPES['sentenceSEO']: {
                                                                    return 'text';
                                                                }
                                                                case Arshavinel\ElleTherapy\View\Site::TYPES['textSEO']: {
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
                                                new Arshwell\Monolith\Table\TableField(get_class($field), $field->id(), 'value'),
                                                (($field)::TRANSLATOR)::LANGUAGES
                                            );
                                            break;
                                        }
                                        case Arshavinel\ElleTherapy\View\Site::TYPES['imageSEO']: {
                                            echo Arshwell\Monolith\Module\HTML\Piece::field(
                                                'value',
                                                array(
                                                    'HTML' => array(
                                                        'label' => $field->info,
                                                        'type'  => 'image',
                                                        'id'    => "field-$i",
                                                        'name'  => "data[$field->type][$field->info]"
                                                    )
                                                ),
                                                new Arshwell\Monolith\Table\Files\Image(get_class($field), $field->id(), 'value'),
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
                <?= Arshwell\Monolith\Module\HTML\Piece::saver(array()) ?>
            </div>
        </div>
    </form>

    <?= Arshwell\Monolith\Module\HTML\Piece::dialog() ?>
</div>
