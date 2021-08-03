<?= App\Core\Piece::html('site/banner', array(
    'background'    => $article->file('preview')->url('big'),
    'sentence'      => $article->translation('title'),
    'tag'           => $article->category
)) ?>

<div class="container padding-3rd-2nd">
    <?= $article->translation('description') ?>
</div>

<div id="section--articles">
    <div class="container padding-2nd-3rd">
        <hr />
        <div class="row justify-content-center">
            <?php
            foreach ($related_articles as $article) { ?>
                <div class="col-sm-6 col-md-4 margin-2nd-4th margin-md-1st-3rd">
                    <div class="h-100 bg-color-7">
                        <a href="<?= App\Core\Web::url('site.blog.show', ['id'=>$article->id(), 'slug'=>$article->translation('title')]) ?>">
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
        <div class="text-center padding-4th-4th padding-md-2nd-2nd">
            <a class="btn btn-4-7" href="<?= App\Core\Web::url('site.blog.all') ?>">
                Vezi toate articolele
            </a>
        </div>
    </div>
</div>
