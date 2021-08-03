<div class="row">
    <?= App\Core\Module\HTML\Piece::actions(array('Conținut', 'Pagini')) ?>
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
                            'label'     => 'Pagina',
                            'type'      => 'text',
                            'preview'   => function (App\Core\Table $row) {
                                return App\Views\CMS::sentence('route.'. $row->source, NULL, true);
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
                        'label'     => 'Pagina',
                        'type'      => 'text',
                        'preview'   => function (string $value) {
                            return App\Views\CMS::sentence('route.'. $value, NULL, true);
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
                            'type'  => 'link',
                            'href'  => function (string $key, int $id) {
                                $source = App\Views\Site::get($id, 'source')->source;

                                if (App\Core\Web::exists($source)) {
                                    return App\Core\Web::url($source);
                                }

                                return '#';
                            },
                            'target'    => '_blank',
                            'icon'      => 'share',
                            'class'     => "btn badge btn-outline-secondary p-2"
                        ),
                        'JS' => array(
                            'tooltip' => array(
                                'title'     => 'Vezi pagina',
                                'placement' => 'top'
                            )
                        )
                    ),
                    array(
                        'HTML' => array(
                            'icon'      => 'edit',
                            'class'     => "btn badge btn-outline-info p-2",
                            'href'      => function (string $key, int $id) {
                                return App\Core\Web::url('cms.content.views.pages.show', [
                                    'id'    => $id,
                                    'slug'  => App\Views\CMS::sentence('route.'. App\Views\Site::get($id, 'source')->source, NULL, true)
                                ]);
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
</div>
