<div class="row">
    <?= Arshwell\Monolith\Module\HTML\Piece::actions(
        array('Conținut', 'General', Arshavinel\ElleTherapy\View\CMS::sentence($source ?: 'view.global', NULL, true)),
        array(
            array(
                'HTML' => array(
                    'text'  => 'Toate categoriile',
                    'type'  => 'link',
                    'href'  => Arshwell\Monolith\Web::url('cms.content.views.general.all'),
                    'class' => "btn btn-sm btn-info"
                )
            )
        )
    ) ?>
</div>

<div class="arshmodule">
    <form method="POST" class="arshmodule-form" action="<?= Arshwell\Monolith\Web::url('cms.content.views.ajax.update') ?>">
        <input type="hidden" name="global" value="1" />
        <input type="hidden" name="source" value="<?= $source ?>" />

        <div class="row">
            <div class="col-lg-8">
                <?php
                if ($views) { ?>
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
                                foreach ($views as $i => $view) {
                                    switch ($view->type) {
                                        case Arshavinel\ElleTherapy\View\Site::TYPES['sentence']: {
                                            echo Arshwell\Monolith\Module\HTML\Piece::field(
                                                'value',
                                                array(
                                                    'HTML' => array(
                                                        'label'     => $view->info,
                                                        'type'      => 'text',
                                                        'id'        => "view-$i",
                                                        'name'      => "data[$view->type][$view->info]",
                                                        'notes'     => function () use ($view) {
                                                            if ($view->vars) {
                                                                return array(call_user_func(function () use ($view) {
                                                                    ob_start(); ?>
                                                                        Primește
                                                                        <u data-toggle="tooltip" data-placement="left" data-html="true"
                                                                        title="<span style='font-size: smaller'>Placeholders:<br><?= implode(', ', array_map(function($key){return'{$'.$key.'}';},range(1, $view->vars))) ?></span>">
                                                                            <?= ($view->vars == 1 ? "o variabilă" : "{$view->vars} variabile") ?>
                                                                        </u>
                                                                    <?php
                                                                    return ob_get_clean();
                                                                }));
                                                            }

                                                            return array();
                                                        }
                                                    )
                                                ),
                                                new Arshwell\Monolith\Table\TableField(get_class($view), $view->id(), 'value'),
                                                (($view)::TRANSLATOR)::LANGUAGES
                                            );
                                            break;
                                        }
                                        case Arshavinel\ElleTherapy\View\Site::TYPES['text']: {
                                            echo Arshwell\Monolith\Module\HTML\Piece::field(
                                                'value',
                                                array(
                                                    'HTML' => array(
                                                        'label'     => $view->info,
                                                        'type'      => 'textarea',
                                                        'id'        => "view-$i",
                                                        'name'      => "data[$view->type][$view->info]",
                                                        'notes'     => function () use ($view) {
                                                            if ($view->vars) {
                                                                return array(call_user_func(function () use ($view) {
                                                                    ob_start(); ?>
                                                                        Primește
                                                                        <u data-toggle="tooltip" data-placement="left" data-html="true"
                                                                        title="<span style='font-size: smaller'>Placeholders:<br><?= implode(', ', array_map(function($key){return'{$'.$key.'}';},range(1, $view->vars))) ?></span>">
                                                                            <?= ($view->vars == 1 ? "o variabilă" : "{$view->vars} variabile") ?>
                                                                        </u>
                                                                    <?php
                                                                    return ob_get_clean();
                                                                }));
                                                            }

                                                            return array();
                                                        }
                                                    )
                                                ),
                                                new Arshwell\Monolith\Table\TableField(get_class($view), $view->id(), 'value'),
                                                (($view)::TRANSLATOR)::LANGUAGES
                                            );
                                            break;
                                        }
                                        case Arshavinel\ElleTherapy\View\Site::TYPES['content']: {
                                            echo Arshwell\Monolith\Module\HTML\Piece::field(
                                                'value',
                                                array(
                                                    'HTML' => array(
                                                        'label'     => $view->info,
                                                        'type'      => 'textarea',
                                                        'id'        => "view-$i",
                                                        'name'      => "data[$view->type][$view->info]",
                                                        'notes'     => function () use ($view) {
                                                            if ($view->vars) {
                                                                return array(call_user_func(function () use ($view) {
                                                                    ob_start(); ?>
                                                                        Primește
                                                                        <u data-toggle="tooltip" data-placement="left" data-html="true"
                                                                        title="<span style='font-size: smaller'>Placeholders:<br><?= implode(', ', array_map(function($key){return'{$'.$key.'}';},range(1, $view->vars))) ?></span>">
                                                                            <?= ($view->vars == 1 ? "o variabilă" : "{$view->vars} variabile") ?>
                                                                        </u>
                                                                    <?php
                                                                    return ob_get_clean();
                                                                }));
                                                            }

                                                            return array();
                                                        }
                                                    ),
                                                    'JS' => array(
                                                        'tinymce' => true
                                                    )
                                                ),
                                                new Arshwell\Monolith\Table\TableField(get_class($view), $view->id(), 'value'),
                                                (($view)::TRANSLATOR)::LANGUAGES
                                            );
                                            break;
                                        }
                                        case Arshavinel\ElleTherapy\View\Site::TYPES['image']: {
                                            echo Arshwell\Monolith\Module\HTML\Piece::field(
                                                'value',
                                                array(
                                                    'HTML' => array(
                                                        'label'     => $view->info,
                                                        'type'      => 'image',
                                                        'id'        => "view-$i",
                                                        'name'      => "data[$view->type][$view->info]"
                                                    )
                                                ),
                                                new Arshwell\Monolith\Table\Files\Image(get_class($view), $view->id(), 'value'),
                                                (($view)::TRANSLATOR)::LANGUAGES
                                            );
                                            break;
                                        }
                                        case Arshavinel\ElleTherapy\View\Site::TYPES['images']: {
                                            echo Arshwell\Monolith\Module\HTML\Piece::field(
                                                'value',
                                                array(
                                                    'HTML' => array(
                                                        'label'     => $view->info,
                                                        'type'      => 'images',
                                                        'id'        => "view-$i",
                                                        'name'      => "data[$view->type][$view->info]",
                                                    )
                                                ),
                                                new Arshwell\Monolith\Table\Files\ImageGroup(get_class($view), $view->id(), 'value'),
                                                (($view)::TRANSLATOR)::LANGUAGES
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
