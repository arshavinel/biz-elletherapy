<?= Arshwell\Monolith\Piece::html('site/banner', array(
    'background'    => Arshavinel\ElleTherapy\View\Site::image('banner.background', 1400, 650),
    'image'         => Arshavinel\ElleTherapy\View\Site::image('banner.imagine', 1400, 500)
)) ?>

<div class="container margin-3rd-3rd">
    <div class="row">
        <div class="col-md-5 mb-3">
            <img src="<?= Arshavinel\ElleTherapy\View\Site::image('despre-mine.poza', 960, 1100) ?>" width="100%" />
        </div>
        <div class="col-md-7">
            <?= Arshavinel\ElleTherapy\View\Site::content('despre-mine.descriere') ?>
        </div>
    </div>
</div>
