<?= Arshwell\Monolith\Piece::html('site/banner', array(
    'half'          => true,
    'background'    => $service->file('preview')->url('big'),
    'sentence'      => $service->translation('title'),
    'tag'           => Arshavinel\ElleTherapy\View\Site::sentence('banner.subtitlu')
)) ?>

<div class="container padding-3rd-3rd">
    <?= $service->translation('description') ?>
</div>
