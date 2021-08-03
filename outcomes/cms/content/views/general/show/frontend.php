<div class="row">
    <?= App\Core\Module\HTML\Piece::actions(
        array('Conținut', 'General', App\Views\CMS::sentence($source ?: 'view.global', NULL, true)),
        array(
            array(
                'HTML' => array(
                    'text'  => 'Toate categoriile',
                    'type'  => 'link',
                    'href'  => App\Core\Web::url('cms.content.views.general.all'),
                    'class' => "btn btn-sm btn-info"
                )
            )
        )
    ) ?>
</div>

<div class="arshmodule">
    <form method="POST" class="arshmodule-form" action="<?= App\Core\Web::url('cms.content.views.ajax.update') ?>">
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
                                foreach ($views as $i => $view) {
                                    switch ($view->type) {
                                        case App\Views\Site::TYPES['sentence']: {
                                            echo App\Core\Module\HTML\Piece::field(
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
                                                new App\Core\Table\TableField(get_class($view), $view->id(), 'value'),
                                                (($view)::TRANSLATOR)::LANGUAGES
                                            );
                                            break;
                                        }
                                        case App\Views\Site::TYPES['text']: {
                                            echo App\Core\Module\HTML\Piece::field(
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
                                                new App\Core\Table\TableField(get_class($view), $view->id(), 'value'),
                                                (($view)::TRANSLATOR)::LANGUAGES
                                            );
                                            break;
                                        }
                                        case App\Views\Site::TYPES['content']: {
                                            echo App\Core\Module\HTML\Piece::field(
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
                                                new App\Core\Table\TableField(get_class($view), $view->id(), 'value'),
                                                (($view)::TRANSLATOR)::LANGUAGES
                                            );
                                            break;
                                        }
                                        case App\Views\Site::TYPES['image']: {
                                            echo App\Core\Module\HTML\Piece::field(
                                                'value',
                                                array(
                                                    'HTML' => array(
                                                        'label'     => $view->info,
                                                        'type'      => 'image',
                                                        'id'        => "view-$i",
                                                        'name'      => "data[$view->type][$view->info]"
                                                    )
                                                ),
                                                new App\Core\Table\Files\Image(get_class($view), $view->id(), 'value'),
                                                (($view)::TRANSLATOR)::LANGUAGES
                                            );
                                            break;
                                        }
                                        case App\Views\Site::TYPES['images']: {
                                            echo App\Core\Module\HTML\Piece::field(
                                                'value',
                                                array(
                                                    'HTML' => array(
                                                        'label'     => $view->info,
                                                        'type'      => 'images',
                                                        'id'        => "view-$i",
                                                        'name'      => "data[$view->type][$view->info]",
                                                    )
                                                ),
                                                new App\Core\Table\Files\ImageGroup(get_class($view), $view->id(), 'value'),
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
                <?= App\Core\Module\HTML\Piece::saver(array()) ?>
            </div>
        </div>
    </form>

    <?= App\Core\Module\HTML\Piece::dialog() ?>
</div>
