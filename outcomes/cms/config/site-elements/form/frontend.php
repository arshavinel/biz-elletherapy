<div class="row">
    <?= Arsh\Core\Module\HTML\Piece::actions(array('Setări', 'Elemente site')) ?>
</div>

<div class="arshmodule">
    <form class="arshmodule-form" method="POST" action="<?= Arsh\Core\Web::url('cms.config.site-elements.ajax.update') ?>">
        <div class="row">
            <div class="col-lg-8">
                <div class="card mb-3">
                    <h6 class="card-header">
                        Prezentare specializări
                    </h6>
                    <div class="card-body pt-2 pb-0">
                        Afișare pe același rând
                        <div class="row">
                            <?php
                            foreach ($config as $info) {
                                switch ($info->title) {
                                    case 'industries_per_row__md': {
                                        echo Arsh\Core\Module\HTML\Piece::field(
                                            'value',
                                            array(
                                                'HTML' => array(
                                                    'wrappers'      => array(
                                                        'col-sm-2', 'col-sm-2'
                                                    ),
                                                    'label'         => 'Tabletă',
                                                    'type'          => 'number',
                                                    'icon'          => 'tablet-alt',
                                                    'id'            => 'industries_per_row__md',
                                                    'name'          => 'industries_per_row__md',
                                                    'placeholder'   => '2-4',
                                                    'value'         => $info->value
                                                )
                                            )
                                        );
                                        break;
                                    }
                                    case 'industries_per_row__lg': {
                                        echo Arsh\Core\Module\HTML\Piece::field(
                                            'value',
                                            array(
                                                'HTML' => array(
                                                    'wrappers'      => array(
                                                        'col-sm-2', 'col-sm-2'
                                                    ),
                                                    'label'         => 'Laptop',
                                                    'type'          => 'number',
                                                    'icon'          => 'laptop',
                                                    'id'            => 'industries_per_row__lg',
                                                    'name'          => 'industries_per_row__lg',
                                                    'placeholder'   => '2-4',
                                                    'value'         => $info->value
                                                )
                                            )
                                        );
                                        break;
                                    }
                                    case 'industries_per_row__xl': {
                                        echo Arsh\Core\Module\HTML\Piece::field(
                                            'value',
                                            array(
                                                'HTML' => array(
                                                    'wrappers'      => array(
                                                        'col-sm-2', 'col-sm-2'
                                                    ),
                                                    'label'         => 'Computer',
                                                    'type'          => 'number',
                                                    'icon'          => 'desktop',
                                                    'id'            => 'industries_per_row__xl',
                                                    'name'          => 'industries_per_row__xl',
                                                    'placeholder'   => '2-4',
                                                    'value'         => $info->value
                                                )
                                            )
                                        );
                                        break;
                                    }
                                }
                            } ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <?= Arsh\Core\Module\HTML\Piece::saver(array()) ?>
            </div>
        </div>
    </form>

    <?= Arsh\Core\Module\HTML\Piece::dialog() ?>
</div>
