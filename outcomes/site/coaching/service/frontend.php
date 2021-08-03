<?= App\Core\Piece::html('site/banner', array(
    'background'    => $service->file('preview')->url('big'),
    'sentence'      => $service->translation('title'),
    'tag'           => App\Views\Site::sentence('banner.subtitlu')
)) ?>

<div class="container padding-3rd-3rd">
    <?= $service->translation('description') ?>
</div>
