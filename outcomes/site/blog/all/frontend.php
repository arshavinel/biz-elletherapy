<?= Arshwell\Monolith\Piece::html('site/banner', array(
    'background'    => Arshavinel\ElleTherapy\View\Site::image('banner.imagine', 1400, 650),
    'sentence'      => Arshavinel\ElleTherapy\View\Site::sentence('banner.text'),
    'tag'           => Arshavinel\ElleTherapy\View\Site::sentence('banner.pagina')
)) ?>

<div id="section--articles" style="background-image: url(<?= Arshavinel\ElleTherapy\View\Site::image('articles.background', 1400, 880) ?>);">
    <div class="container padding-7th-6th">
        <div class="row">
            <?php
            foreach ($articles as $article) { ?>
                <div class="col-sm-6 col-md-4 margin-2nd-4th margin-md-1st-3rd">
                    <div class="h-100 bg-color-7">
                        <a href="<?= Arshwell\Monolith\Web::url('site.blog.show', ['id'=>$article->id(), 'slug'=>$article->translation('title')]) ?>">
                            <div class="image padding-15th-15th padding-sm-8th-8th padding-md-5th-5th" style="background-image: url('<?= $article->file('preview')->url('medium') ?>');">
                                <span class="bg-color-2 text-color-7 px-1">
                                    <?= $article->category ?>
                                </span>
                            </div>
                            <div class="bg-color-7 text-color-2 py-2 px-3">
                                <h4 class="my-0"><?= $article->translation('title') ?></h4>
                            </div>
                        </a>
                    </div>
                </div>
            <?php } ?>
        </div>
        <?= Arshwell\Monolith\Piece::html("paginations/site", array(
            'count'     => $count,
            'visible'   => $limit,
            'buttons'   => array(
                'xs' => 3,
                'sm' => 4,
                'md' => 5,
                'lg' => 6,
                'xl' => 7
            ),
            'icons' => array(
                'first' => 'angle-double-left',
                'left'  => 'angle-left',
                'right' => 'angle-right',
                'last'  => 'angle-double-right'
            )
        )) ?>
    </div>
</div>
