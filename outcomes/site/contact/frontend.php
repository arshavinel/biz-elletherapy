<?= Arshwell\Monolith\Piece::html('site/banner', array(
    'background'    => Arshavinel\ElleTherapy\View\Site::image('banner.imagine', 1400, 650),
    'sentence'      => Arshavinel\ElleTherapy\View\Site::sentence('banner.text'),
    'tag'           => Arshavinel\ElleTherapy\View\Site::sentence('banner.pagina')
)) ?>

<div id="section--letter" class="container margin-3rd-3rd">
    <div class="padding-3rd-0 shadow bg-color-7 px-3">

        <div class="row">
            <div class="col-12 padding-0-5th">
                <?= Arshavinel\ElleTherapy\View\Site::content('box.text') ?>
            </div>

            <div class="col-md-6">
                <div class="border border-color-2 text-color-2 p-3 pb-2 h-100">
                    <h1><?= Arshavinel\ElleTherapy\View\Site::sentence('contact.titlu') ?></h1>

                    <div class="padding-1st-1st">
                        <div>
                            <b><?= Arshavinel\ElleTherapy\View\Site::sentence('contact.email') ?></b>
                            <a href="mailto: <?= str_replace(' ', '', Arshavinel\ElleTherapy\Table\Config::title('email')) ?>">
                                <?= Arshavinel\ElleTherapy\Table\Config::title('email') ?>
                            </a>
                        </div>
                        <div>
                            <b><?= Arshavinel\ElleTherapy\View\Site::sentence('contact.adresa') ?></b>
                            <?= Arshavinel\ElleTherapy\View\Site::content('adresă.romania', NULL, true) ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 mt-3 mt-md-0">
                <div class="border border-color-3 px-3 h-100">
                    <?php
                    foreach ($social_media as $media) { ?>
                        <div class="media padding-3rd-3rd padding-md-1st-1st">
                            <a href="<?= $media->link ?>">
                                <img src="<?= $media->file('icon')->url('tinny') ?>" class="align-self-center mr-3" alt="<?= $media->translation('text') ?>">
                            </a>
                            <div class="media-body align-self-center">
                                <a href="<?= $media->link ?>" class="text-color-4">
                                    <?= $media->translation('text') ?>
                                </a>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>

        <div id="letter">
            <img class="mt-3" src="<?= Arshavinel\ElleTherapy\View\Site::image('letter.imagine', 1300, 928) ?>" width="100%" height="auto" />
        </div>
    </div>
</div>
