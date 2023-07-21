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
