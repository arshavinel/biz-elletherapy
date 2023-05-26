<?= Arshwell\Monolith\Piece::html('site/banner', array(
    'background'    => Arshavinel\ElleTherapy\View\Site::image('banner.imagine', 1400, 650),
    'sentence'      => Arshavinel\ElleTherapy\View\Site::sentence('banner.text'),
    'tag'           => Arshavinel\ElleTherapy\View\Site::sentence('banner.pagina')
)) ?>

<div id="section--story" class="container margin-3rd-3rd">
    <div class="row justify-content-center bg-color-7 padding-4th-4th">
        <div class="col-md-10">
            <?= Arshavinel\ElleTherapy\View\Site::content('poveste') ?>
        </div>
    </div>
</div>

<div class="container text-center margin-0-4th">
    <h2 class="margin-2nd-3rd">
        <?= Arshavinel\ElleTherapy\View\Site::sentence('lucruri.interesante') ?>
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
