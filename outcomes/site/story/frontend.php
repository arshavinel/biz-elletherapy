<?= Arsh\Core\Piece::html('site/banner', array(
    'background'    => Brain\View\Site::image('banner.imagine', 1400, 650),
    'sentence'      => Brain\View\Site::sentence('banner.text'),
    'tag'           => Brain\View\Site::sentence('banner.pagina')
)) ?>

<div id="section--story" class="container margin-3rd-3rd">
    <div class="row justify-content-center bg-color-7 padding-4th-4th">
        <div class="col-md-10">
            <?= Brain\View\Site::content('poveste') ?>
        </div>
    </div>
</div>

<div class="container text-center">
    <h2 class="margin-2nd-3rd">
        <?= Brain\View\Site::sentence('lucruri.interesante') ?>
    </h2>
    <div class="row">
        <?php
        foreach ($interestings as $interesting) { ?>
            <div class="col-sm-6 col-md">
                <div class="border border-color-2 bg-color-7 text-color-2 h-100 p-4">
                    <?= $interesting->translation('text') ?>
                </div>
            </div>
        <?php } ?>
    </div>
</div>

<div id="section--media" class="container margin-5th-4th">
    <div class="row">
        <div class="col-md-5">
            <video controls controlsList="play timeline volume nodownload" poster="<?= Brain\View\Site::image('video.thumbnail', 800, 450) ?>" preload="metadata" class="w-100">
                <source src="<?= Brain\View\Site::video('video') ?>" />
                <?= Brain\View\Site::sentence('video.incompatibil', NULL, true) ?>
            </video>
        </div>
        <div class="col-md-7">
            <h3><?= Brain\View\Site::sentence('video.titlu') ?></h3>
            <?= Brain\View\Site::content('video.descriere') ?>
        </div>
    </div>
</div>
