<?= Arshwell\Monolith\Piece::html('site/banner', array(
    'background'    => Arshavinel\ElleTherapy\View\Site::image('banner.imagine', 1400, 650),
    'sentence'      => Arshavinel\ElleTherapy\View\Site::sentence('banner.text'),
    'tag'           => Arshavinel\ElleTherapy\View\Site::sentence('banner.pagina')
)) ?>

<div class="bg-color-3">
    <div class="container text-color-7 text-center padding-4th-4th padding-md-2nd-2nd">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <?= Arshavinel\ElleTherapy\View\Site::content('box.intro.text') ?>
            </div>
        </div>
    </div>
</div>

<div class="container margin-3rd-3rd">
    <div class="row justify-content-center">
        <div class="col-md-4">
            <h4><?= Arshavinel\ElleTherapy\View\Site::sentence('sectiune.title') ?></h4>
        </div>
        <div class="col-md-6">
            <?= Arshavinel\ElleTherapy\View\Site::content('sectiune.descriere') ?>
        </div>
    </div>
</div>

<div class="bg-color-2">
    <div class="container text-color-7 padding-4th-4th padding-md-2nd-2nd text-center">
        <?= Arshavinel\ElleTherapy\View\Site::content('box.industries.text') ?>
    </div>
</div>

<div class="padding-6th-0 padding-sm-3rd-3rd">
    <?= Arshwell\Monolith\Piece::html('site/industry-comparison') ?>
</div>

<?= Arshwell\Monolith\Piece::html('site/services', array(
    'homepage' => false,
    'button' => array(
        'link' => Arshwell\Monolith\Web::url('site.appoint'),
        'text' => Arshavinel\ElleTherapy\View\Site::sentence('servicii.link.text')
    )
)) ?>

<div class="bg-color-2">
    <div class="container text-color-7 padding-4th-4th padding-md-2nd-2nd text-center">
        <?= Arshavinel\ElleTherapy\View\Site::content('box.NLP.text') ?>
    </div>
</div>

<div id="section--nlp-questions" class="container margin-2nd-3rd">
    <div class="row justify-content-center">
        <?php
        foreach ($nlpFaqs as $i => $faq) { ?>
            <div class="<?= ((next($nlpFaqs) == true || $i % 2 == 1) ? 'col-md-6' : 'col-12') ?> padding-3rd-3rd padding-md-1st-1st">
                <div class="bg-paper h-100">
                    <h2><?= $faq->translation('question') ?></h2>
                    <?= $faq->translation('answer') ?>
                </div>
            </div>
        <?php } ?>
    </div>
</div>
