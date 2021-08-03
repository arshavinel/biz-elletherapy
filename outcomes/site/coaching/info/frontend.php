<?= App\Core\Piece::html('site/banner', array(
    'background'    => App\Views\Site::image('banner.imagine', 1400, 650),
    'sentence'      => App\Views\Site::sentence('banner.text'),
    'tag'           => App\Views\Site::sentence('banner.pagina')
)) ?>

<div class="bg-color-3">
    <div class="container text-color-7 text-center padding-4th-4th padding-md-2nd-2nd">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <?= App\Views\Site::content('box.1.text') ?>
            </div>
        </div>
    </div>
</div>

<div class="container margin-3rd-3rd">
    <div class="row justify-content-center">
        <div class="col-md-4">
            <h4><?= App\Views\Site::sentence('sectiune.title') ?></h4>
        </div>
        <div class="col-md-6">
            <?= App\Views\Site::content('sectiune.descriere') ?>
        </div>
    </div>
</div>

<div class="bg-color-2">
    <div class="container text-color-7 padding-4th-4th padding-md-2nd-2nd text-center">
        <?= App\Views\Site::content('box.2.text') ?>
    </div>
</div>

<div class="padding-6th-0 padding-sm-3rd-3rd">
    <?= App\Core\Piece::html('site/industry-comparison') ?>
</div>

<?= App\Core\Piece::html('site/services', array(
    'homepage' => false,
    'button' => array(
        'link' => App\Core\Web::url('site.contact'),
        'text' => App\Views\Site::sentence('servicii.link.text')
    )
)) ?>
