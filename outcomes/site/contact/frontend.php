<?= Arshwell\Monolith\Piece::html('site/banner', array(
    'background'    => Arshavinel\ElleTherapy\View\Site::image('banner.imagine', 1400, 650),
    'sentence'      => Arshavinel\ElleTherapy\View\Site::sentence('banner.text'),
    'tag'           => Arshavinel\ElleTherapy\View\Site::sentence('banner.pagina')
)) ?>

<div id="section--letter" class="container margin-3rd-3rd">
    <form class="row padding-3rd-0 shadow bg-color-7">
        <div class="col-12 col-sm mb-1 mb-sm-2">
            <input type="text" class="form-control" name="name" placeholder="Nume" />
            <span class="text-danger" form-error="name"></span>
        </div>
        <div class="col-12 col-sm mb-1 mb-sm-2">
            <input type="text" class="form-control" name="email" placeholder="Email" />
            <span class="text-danger" form-error="email"></span>
        </div>
        <div class="col-12 col-sm mb-1 mb-sm-2">
            <input type="text" class="form-control" name="phone" placeholder="Telefon" />
            <span class="text-danger" form-error="phone"></span>
        </div>
        <div class="col-12 mb-2">
            <textarea class="form-control" name="message" placeholder="Mesaj"></textarea>
            <span class="text-danger" form-error="message"></span>
        </div>

        <div class="col-12">
            <div class="form-group form-check">
                <input type="checkbox" class="form-check-input" name="privacy" value="1" id="contact-form--privacy" />
                <label class="form-check-label" for="contact-form--privacy">
                    Sunt de acord cu Politica de confidențialitate
                    <small class="text-danger" form-error="privacy"></small>
                </label>
            </div>
        </div>

        <div class="col-5 col-sm-4 col-sm-auto">
            <input type="submit" class="btn-4-7 nowrap" value="Trimite" />
        </div>
        <div class="col-7 col-sm-8 col-sm-auto mb-5">
            <b class="d-inline-block text-color-5 info" data-response="require"></b>
        </div>

        <div class="col-md-6">
            <div class="border border-color-2 text-color-2 p-3 pb-2 h-100">
                <h1><?= Arshavinel\ElleTherapy\View\Site::sentence('contact.titlu') ?></h1>

                <b><?= Arshavinel\ElleTherapy\View\Site::sentence('contact.email') ?></b>
                <?= Arshavinel\ElleTherapy\Table\Config::title('email') ?>

                <div class="padding-1st-1st">
                    <h5>România</h5>
                    <div>
                        <b><?= Arshavinel\ElleTherapy\View\Site::sentence('contact.telefon') ?></b>
                        <a href="tel:<?= str_replace(' ', '', Arshavinel\ElleTherapy\Table\Config::title('phone_romania')) ?>">
                            <?= Arshavinel\ElleTherapy\Table\Config::title('phone_romania') ?>
                        </a> (WhatsApp și Viber)
                    </div>
                    <div>
                        <b><?= Arshavinel\ElleTherapy\View\Site::sentence('contact.adresa') ?></b>
                        <?= Arshavinel\ElleTherapy\View\Site::content('adresă.romania', NULL, true) ?>
                    </div>
                </div>

                <div class="padding-1st-1st">
                    <h5>Republica Moldova</h5>
                    <div>
                        <b><?= Arshavinel\ElleTherapy\View\Site::sentence('contact.telefon') ?></b>
                        <a href="tel:<?= str_replace(' ', '', Arshavinel\ElleTherapy\Table\Config::title('phone_moldova')) ?>">
                            <?= Arshavinel\ElleTherapy\Table\Config::title('phone_moldova') ?>
                        </a>
                    </div>
                    <div>
                        <b><?= Arshavinel\ElleTherapy\View\Site::sentence('contact.adresa') ?></b>
                        <?= Arshavinel\ElleTherapy\View\Site::content('adresă.moldova', NULL, true) ?>
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

        <div id="letter">
            <img class="mt-3" src="<?= Arshavinel\ElleTherapy\View\Site::image('letter.imagine', 1300, 928) ?>" width="100%" height="auto" />
        </div>
    </form>
</div>
