<div id="bg-image" style="background-image: url(<?= $raffle->file('bg_image')->url('big') ?>);">
    <div class="container text-center">
        <table class="w-100">
            <tr class="padding-3rd-3rd"><td>
                <?php
                if (App\Tables\CMS\Admin::LoggedInID() || App\Tables\CMS\Admin::issetCookieID()) { ?>
                    <div class="nav flex-column nav-pills" role="tablist" aria-orientation="vertical">
                        <a class="nav-link active" id="user-tab--join" data-toggle="pill" href="#user-content--join" role="tab" aria-controls="user-content--join" aria-selected="true">
                            <?= App\Views\Site::sentence('form.submit.text') ?>
                        </a>
                        <a class="nav-link" id="user-tab--winner" data-toggle="pill" href="#user-content--winner" role="tab" aria-controls="user-content--winner" aria-selected="false">
                            <?= App\Views\Site::sentence('buton.alege.text') ?>
                        </a>
                    </div>
                <?php } ?>

                <div class="tab-content">
                    <!-- Join raffle -->
                    <div class="tab-pane fade show active" id="user-content--join" role="tabpanel" aria-labelledby="user-tab--join">
                        <?php
                        if ($winner == NULL) { ?>
                            <form id="user-content--join-form" action="<?= App\Core\Web::url('site.ajax.events.promo.raffle.join') ?>">
                                <input type="hidden" name="id_raffle" value="<?= $raffle->id() ?>" />

                                <b class="text-message-green" confirmation="join"
                                style="<?= empty($_SESSION['events'][$meeting->id()]['raffles'][$raffle->id()]['name']) ? 'display: none;' : '' ?>">
                                    <?= App\Views\Site::text('confirmare', array(
                                        'name' => '<u><span field="name">'.($_SESSION['events'][$meeting->id()]['raffles'][$raffle->id()]['name'] ?? '').'</span></u>'
                                    )) ?>
                                </b>

                                <div class="mt-3 mb-5">
                                    <h2>
                                        <b><?= App\Views\Site::sentence('titlu.event') ?></b>
                                        <i>"<?= $meeting->translation('title') ?>"</i>
                                    </h2>
                                    <h4>
                                        <b><?= App\Views\Site::sentence('titlu.tombolă') ?></b>
                                        <i><?= $raffle->translation('title') ?></i>
                                    </h4>
                                </div>

                                <div class="text-center mb-2"><?= $raffle->translation('text') ?></div>

                                <div class="row justify-content-center">
                                    <div class="col-6 mb-1 text-right">
                                        <input type="text" class="form-control d-inline-block w-auto mw-100" name="first_name" value="<?= $form->value('first_name') ?>"
                                        placeholder="<?= App\Views\Site::sentence('form.câmp.prenume.placeholder') ?> *" />
                                        <span class="text-message-pink" form-error="first_name"></span>
                                    </div>
                                    <div class="col-6 mb-1 text-left">
                                        <input type="text" class="form-control d-inline-block w-auto mw-100" name="last_name" value="<?= $form->value('last_name') ?>"
                                        placeholder="<?= App\Views\Site::sentence('form.câmp.nume.placeholder') ?> *" />
                                        <span class="text-message-pink" form-error="last_name"></span>
                                    </div>
                                    <div class="col-6 mb-1 text-right">
                                        <input type="text" class="form-control d-inline-block w-auto mw-100" name="phone" value="<?= $form->value('phone') ?>"
                                        placeholder="<?= App\Views\Site::sentence('form.câmp.telefon.placeholder') ?>" />
                                        <span class="text-message-pink" form-error="phone"></span>
                                    </div>
                                    <div class="col-6 mb-1 text-left">
                                        <input type="text" class="form-control d-inline-block w-auto mw-100" name="email" value="<?= $form->value('email') ?>"
                                        placeholder="<?= App\Views\Site::sentence('form.câmp.email.placeholder') ?>" />
                                        <span class="text-message-pink" form-error="email"></span>
                                    </div>
                                </div>

                                <div class="form-group form-check d-inline-block">
                                    <input type="checkbox" class="form-check-input" name="privacy" value="1" id="contact-form--privacy" />
                                    <label class="form-check-label d-sm-inline-block text-left" for="contact-form--privacy">
                                        <?= App\Views\Site::sentence('form.politică', array(
                                            'link' => '<a target="_blank" class="text-color-1" href="'. App\Core\Web::url('site.legal.privacy') .'">'.
                                                App\Views\Site::sentence('form.politică.link.text') .
                                            '</a>'
                                        )) ?> <span class="text-message-pink">*</span>
                                        <small class="text-message-pink" form-error="privacy"></small>
                                    </label>
                                </div>

                                <div class="text-center">
                                    <input type="submit" class="btn-7-2 nowrap" value="<?= App\Views\Site::sentence('form.submit.text') ?>" />
                                </div>
                                <div class="my-2">
                                    <b class="d-inline-block text-message-green" data-response="message">
                                        <?= App\Views\Site::sentence('form.răspuns') ?>
                                    </b>
                                </div>
                            </form>
                        <?php } ?>

                        <!-- Raffle expired -->
                        <div id="user-content--join-expired" style="<?= $winner == NULL ? 'display: none;' : '' ?>">
                            <div class="mt-3 mb-5">
                                <h2>
                                    <b><?= App\Views\Site::sentence('titlu.event') ?></b>
                                    <i>"<?= $meeting->translation('title') ?>"</i>
                                </h2>
                                <h4>
                                    <b><?= App\Views\Site::sentence('titlu.tombolă') ?></b>
                                    <i><?= $raffle->translation('title') ?></i>
                                </h4>
                            </div>

                            <?= App\Views\Site::content('tombolă.expirată.text') ?>
                        </div>
                    </div>

                    <!-- Generate winner -->
                    <div class="tab-pane fade" id="user-content--winner" role="tabpanel" aria-labelledby="user-tab--winner">
                        <form action="<?= App\Core\Web::url('site.ajax.events.promo.raffle.pick') ?>">
                            <input type="hidden" name="id_raffle" value="<?= $raffle->id() ?>" />

                            <div class="text-center mb-4">
                                <input type="submit" <?= ($winner == NULL ? '' : 'disabled="disabled" style="cursor: not-allowed;"') ?>
                                class="btn-7-2 nowrap" value="<?= App\Views\Site::sentence('buton.alege.text') ?>" />
                            </div>
                            <div class="text-message-green" confirmation="generate"
                            style="<?= ($winner == NULL ? 'display: none;' : '') ?>">
                                <span field="name">
                                    <?php
                                    if ($winner) { ?>
                                        <b><?= $winner->name ?></b><br>(<?= trim($winner->phone .' | '. $winner->email, '| ') ?>)
                                    <?php } ?>
                                </span>
                            </div>
                        </form>
                    </div>
                </div>
            </td></tr>
        </table>
    </div>
</div>
