<div class="row">
    <?= App\Core\Module\HTML\Piece::actions(array('Conținut', 'General')) ?>
</div>

<div class="arshmodule">
    <form action="<?= App\Core\URL::get() ?>" method="GET">
        <div class="card border-bottom-0 rounded-0">
            <div class="card-body pt-1 pb-0">
                <?= App\Core\Module\HTML\Piece::thead(
                    array_merge(
                        $_GET,
                        array('columns' => array('source', 'count', 'updated_at'))
                    ),
                    array(
                        'source' => array(
                            'label'     => 'Sursa',
                            'type'      => 'text',
                            'preview'   => function (App\Core\Table $row) {
                                return App\Views\CMS::sentence($row->source ?: 'view.global', NULL, true);
                            }
                        ),
                        'count' => array(
                            'label'     => 'Elemente',
                            'type'      => 'text'
                        ),
                        'updated_at' => array(
                            'label'     => 'Ultima editare',
                            'type'      => 'date'
                        )
                    )
                ) ?>
            </div>
        </div>
    </form>
    <div class="card border-top-0 rounded-0">
        <div class="card-body pt-0 pb-1">
            <?= App\Core\Module\HTML\Piece::tbody(
                array_merge(
                    $_GET,
                    array('columns' => array('source', 'count', 'updated_at'))
                ),
                $views,
                array(
                    'source' => array(
                        'label'     => 'Sursa',
                        'type'      => 'text',
                        'preview'   => function (string $value) {
                            return App\Views\CMS::sentence($value ?: 'view.global', NULL, true);
                        }
                    ),
                    'count' => array(
                        'label'     => 'Elemente',
                        'type'      => 'text'
                    ),
                    'updated_at' => array(
                        'label'     => 'Ultima editare',
                        'type'      => 'date'
                    )
                ),
                array(
                    array(
                        'HTML' => array(
                            'icon'      => 'edit',
                            'class'     => "btn badge btn-outline-info p-2",
                            'href'      => function ($key, $id) {
                                return App\Core\Web::url('cms.content.views.general.show', ['id'=>$id]);
                            }
                        ),
                        'JS' => array(
                            'tooltip' => array(
                                'title'     => 'Editează',
                                'placement' => 'top'
                            )
                        )
                    )
                )
            ) ?>
        </div>
    </div>
