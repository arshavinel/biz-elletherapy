<div id="bg-image" style="background-image: url(<?= $discount->file('bg_image')->url('big') ?>);">
    <div class="container text-center">
        <table class="w-100">
            <tr class="padding-3rd-3rd"><td>
                <div id="content-form">
                    <form action="<?= Arshwell\Monolith\Web::url('site.ajax.events.promo.discount.join') ?>">
                        <input type="hidden" name="id_discount" value="<?= $discount->id() ?>" />

                        <b class="text-message-green" id="join-confirmation"
                        style="<?= empty($_SESSION['events'][$meeting->id()]['discounts'][$discount->id()]) ? 'display: none;' : '' ?>">
                            <?= Arshavinel\ElleTherapy\View\Site::text('confirmare', array(
                                'email' => '<span field="email">'.($_SESSION['events'][$meeting->id()]['discounts'][$discount->id()]['email'] ?? '{$1}').'</span>'
                            )) ?>
                        </b>

                        <div class="mt-3 mb-5">
                            <h2>
                                <b><?= Arshavinel\ElleTherapy\View\Site::sentence('titlu.event') ?></b>
                                <i>"<?= $meeting->translation('title') ?>"</i>
                            </h2>
                            <h4>
                                <b><?= Arshavinel\ElleTherapy\View\Site::sentence('titlu.tombolă') ?></b>
                                <i><?= $discount->translation('title') ?></i>
                            </h4>
                        </div>

                        <div class="text-center mb-1"><?= $discount->translation('text') ?></div>
                        <input type="text" class="form-control d-inline-block w-auto mw-100" name="email" value="<?= $form->value('email') ?>"
                        placeholder="<?= Arshavinel\ElleTherapy\View\Site::sentence('form.câmp.email.placeholder') ?>" />
                        <span class="text-message-pink" form-error="email"></span>

                        <div class="form-group form-check d-inline-block">
                            <input type="checkbox" class="form-check-input" name="privacy" value="1" id="contact-form--privacy" />
                            <label class="form-check-label d-sm-inline-block text-left" for="contact-form--privacy">
                                <?= Arshavinel\ElleTherapy\View\Site::sentence('form.politică', array(
                                    'link' => '<a target="_blank" href="'. Arshwell\Monolith\Web::url('site.legal.privacy') .'">'.
                                        Arshavinel\ElleTherapy\View\Site::sentence('form.politică.link.text') .
                                    '</a>'
                                )) ?> <span class="text-message-pink">*</span>
                                <small class="text-message-pink" form-error="privacy"></small>
                            </label>
                        </div>

                        <div class="text-center">
                            <input type="submit" class="btn-7-2 nowrap" value="<?= Arshavinel\ElleTherapy\View\Site::sentence('form.submit.text') ?>" />
                        </div>
                        <div class="my-2">
                            <b class="d-inline-block text-message-green" data-response="message">
                                <?= Arshavinel\ElleTherapy\View\Site::sentence('form.răspuns') ?>
                            </b>
                        </div>
                    </form>
                </div>
                <div id="content-expired" style="display: none;">
                    <div class="mt-3 mb-5">
                        <h2>
                            <b><?= Arshavinel\ElleTherapy\View\Site::sentence('titlu.event') ?></b>
                            <i>"<?= $meeting->translation('title') ?>"</i>
                        </h2>
                        <h4>
                            <b><?= Arshavinel\ElleTherapy\View\Site::sentence('titlu.tombolă') ?></b>
                            <i><?= $discount->translation('title') ?></i>
                        </h4>
                    </div>

                    <?= Arshavinel\ElleTherapy\View\Site::content('tombolă.expirată.text') ?>
                <div>
            </td></tr>
        </table>
    </div>
</div>
