<div class="row">
    <?= Arshwell\Monolith\Module\HTML\Piece::actions(array('CMS', 'Conținut', 'Pagini')) ?>
</div>

<div class="arshmodule">

    <!-- thead -->
    <form action="<?= Arshwell\Monolith\URL::get() ?>" method="GET">
        <div class="card border-bottom-0 rounded-0">
            <div class="card-body pt-1 pb-0">
                <?= Arshwell\Monolith\Module\HTML\Piece::thead(
                    array_merge( // query
                        $_GET,
                        array('columns' => array('source', 'count', 'updated_at'))
                    ),
                    array( // HTMLs
                        'source' => array(
                            'label'     => 'Pagina',
                            'type'      => 'text',
                            'preview'   => function (Arshwell\Monolith\Table $row) {
                                return Arshavinel\ElleTherapy\View\CMS::sentence('route.'. $row->source, NULL, true);
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

    <!-- tbody -->
    <div class="card border-top-0 rounded-0">
        <div class="card-body pt-0 pb-1">
            <?= Arshwell\Monolith\Module\HTML\Piece::tbody(
                array_merge( // query
                    $_GET,
                    array('columns' => array('source', 'count', 'updated_at'))
                ),
                $views, // data
                array( // HTMLs
                    'source' => array(
                        'label'     => 'Pagina',
                        'type'      => 'text',
                        'preview'   => function (string $value) {
                            return Arshavinel\ElleTherapy\View\CMS::sentence('route.'. $value, NULL, true);
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
                array( // features
                    array(
                        'HTML' => array(
                            'type'  => 'link',
                            'href'  => function (string $key, int $id) {
                                $source = Arshavinel\ElleTherapy\View\CMS::get($id, 'source')->source;

                                if (Arshwell\Monolith\Web::exists($source)) {
                                    return Arshwell\Monolith\Web::url($source);
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
                                return Arshwell\Monolith\Web::url('cms.cms.content.pages.show', [
                                    'id'    => $id,
                                    'slug'  => Arshavinel\ElleTherapy\View\CMS::sentence('route.'. Arshavinel\ElleTherapy\View\CMS::get($id, 'source')->source, NULL, true)
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
