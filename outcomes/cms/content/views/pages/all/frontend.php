<div class="row">
    <?= Arsh\Core\Module\HTML\Piece::actions(array('Conținut', 'Pagini')) ?>
</div>

<div class="arshmodule">
    <form action="<?= Arsh\Core\URL::get() ?>" method="GET">
        <div class="card border-bottom-0 rounded-0">
            <div class="card-body pt-1 pb-0">
                <?= Arsh\Core\Module\HTML\Piece::thead(
                    array_merge(
                        $_GET,
                        array('columns' => array('source', 'count', 'updated_at'))
                    ),
                    array(
                        'source' => array(
                            'label'     => 'Pagina',
                            'type'      => 'text',
                            'preview'   => function (Arsh\Core\Table $row) {
                                return Brain\View\CMS::sentence('route.'. $row->source, NULL, true);
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
            <?= Arsh\Core\Module\HTML\Piece::tbody(
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
                            return Brain\View\CMS::sentence('route.'. $value, NULL, true);
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
                                $source = Brain\View\Site::get($id, 'source')->source;

                                if (Arsh\Core\Web::exists($source)) {
                                    return Arsh\Core\Web::url($source);
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
                                return Arsh\Core\Web::url('cms.content.views.pages.show', [
                                    'id'    => $id,
                                    'slug'  => Brain\View\CMS::sentence('route.'. Brain\View\Site::get($id, 'source')->source, NULL, true)
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
