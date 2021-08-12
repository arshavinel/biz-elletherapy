<?= Arsh\Core\Piece::html('site/banner', array(
    'background'    => Brain\View\Site::image('banner.imagine', 1400, 650),
    'sentence'      => Brain\View\Site::sentence('banner.text'),
    'tag'           => Brain\View\Site::sentence('banner.pagina')
)) ?>

<div class="bg-color-5">
    <div class="container text-color-7 text-center padding-4th-4th padding-md-2nd-2nd">
        <?= Brain\View\Site::content('box.1.text') ?>
    </div>
</div>

<div id="section--questions" class="container margin-2nd-3rd">
    <div class="row justify-content-center">
        <?php
        foreach ($faqs as $i => $faq) { ?>
            <div class="<?= ((next($faqs) == true || $i % 2 == 1) ? 'col-md-6' : 'col-12') ?> padding-3rd-3rd padding-md-1st-1st">
                <div class="bg-paper h-100">
                    <h2><?= $faq->translation('question') ?></h2>
                    <?= $faq->translation('answer') ?>
                </div>
            </div>
        <?php } ?>
    </div>
</div>
