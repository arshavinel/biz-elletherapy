<div class="row">
    <?= Arshwell\Monolith\Module\HTML\Piece::actions(array('Setări', 'Generale')) ?>
</div>

<div class="arshmodule">
    <form class="arshmodule-form" method="POST" action="<?= Arshwell\Monolith\Web::url('cms.config.general.ajax.update') ?>">
        <div class="row">
            <div class="col-lg-8">
                <div class="card mb-3">
                    <h6 class="card-header">
                        Editare
                    </h6>
                    <div class="card-body pt-2 pb-0">
                        <div class="row">
                            <?php
                            foreach ($config as $info) {
                                switch ($info->title) {
                                    case 'email': {
                                        echo Arshwell\Monolith\Module\HTML\Piece::field(
                                            'value',
                                            array(
                                                'HTML' => array(
                                                    'label'     => 'Email',
                                                    'type'      => 'text',
                                                    'icon'      => 'envelope',
                                                    'id'        => 'email',
                                                    'name'      => 'email',
                                                    'value'     => $info->value
                                                )
                                            )
                                        );
                                        break;
                                    }
                                    case 'phone_romania': {
                                        echo Arshwell\Monolith\Module\HTML\Piece::field(
                                            'value',
                                            array(
                                                'HTML' => array(
                                                    'label'     => 'Telefon România',
                                                    'type'      => 'text',
                                                    'icon'      => 'phone-square',
                                                    'id'        => 'phone_romania',
                                                    'name'      => 'phone_romania',
                                                    'value'     => $info->value
                                                )
                                            )
                                        );
                                        break;
                                    }
                                    case 'phone_moldova': {
                                        echo Arshwell\Monolith\Module\HTML\Piece::field(
                                            'value',
                                            array(
                                                'HTML' => array(
                                                    'label'     => 'Telefon R. Moldova',
                                                    'type'      => 'text',
                                                    'icon'      => 'phone-square',
                                                    'id'        => 'phone_moldova',
                                                    'name'      => 'phone_moldova',
                                                    'value'     => $info->value
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
                <?= Arshwell\Monolith\Module\HTML\Piece::saver(array()) ?>
            </div>
        </div>
    </form>

    <?= Arshwell\Monolith\Module\HTML\Piece::dialog() ?>
</div>
