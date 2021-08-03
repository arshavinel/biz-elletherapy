<?= App\Core\Piece::html('site/banner', array(
    'background'    => App\Views\Site::image('banner.imagine', 1400, 650),
    'sentence'      => App\Views\Site::sentence('banner.text'),
    'tag'           => App\Views\Site::sentence('banner.pagina')
)) ?>

<div class="bg-color-2">
    <div class="container text-color-7 text-center padding-4th-4th padding-md-2nd-2nd">
        <?= App\Views\Site::content('box.1.text') ?>
    </div>
</div>

<div id="section--media" class="container margin-4th-2nd">
    <?php
    foreach ($media as $i => $m) { ?>
        <div class="row margin-0-4th">
            <div class="col-md-5 <?= ($i % 2 == 1 ? 'order-md-12' : '') ?> mb-3 mb-md-0">
                <iframe width="100%" height="100%" src="<?= $m->src ?>"
                style="background-image: url('<?= App\Views\Site::image('media.background', 608, 405) ?>');"></iframe>
            </div>
            <div class="col-md-7">
                <h3><?= $m->translation('title') ?></h3>
                <?= $m->translation('description') ?>
            </div>
        </div>
    <?php } ?>
</div>
