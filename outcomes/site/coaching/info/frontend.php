<?= Arsh\Core\Piece::html('site/banner', array(
    'background'    => Brain\View\Site::image('banner.imagine', 1400, 650),
    'sentence'      => Brain\View\Site::sentence('banner.text'),
    'tag'           => Brain\View\Site::sentence('banner.pagina')
)) ?>

<div class="bg-color-3">
    <div class="container text-color-7 text-center padding-4th-4th padding-md-2nd-2nd">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <?= Brain\View\Site::content('box.1.text') ?>
            </div>
        </div>
    </div>
</div>

<div class="container margin-3rd-3rd">
    <div class="row justify-content-center">
        <div class="col-md-4">
            <h4><?= Brain\View\Site::sentence('sectiune.title') ?></h4>
        </div>
        <div class="col-md-6">
            <?= Brain\View\Site::content('sectiune.descriere') ?>
        </div>
    </div>
</div>

<div class="bg-color-2">
    <div class="container text-color-7 padding-4th-4th padding-md-2nd-2nd text-center">
        <?= Brain\View\Site::content('box.2.text') ?>
    </div>
</div>

<div class="padding-6th-0 padding-sm-3rd-3rd">
    <?= Arsh\Core\Piece::html('site/industry-comparison') ?>
</div>

<?= Arsh\Core\Piece::html('site/services', array(
    'homepage' => false,
    'button' => array(
        'link' => Arsh\Core\Web::url('site.contact'),
        'text' => Brain\View\Site::sentence('servicii.link.text')
    )
)) ?>
