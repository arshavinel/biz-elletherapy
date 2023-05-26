<?= Arshwell\Monolith\Piece::html('site/banner', array(
    'background'    => Arshavinel\ElleTherapy\View\Site::image('banner.imagine', 1400, 650),
    'half'          => true,
    'sentence'      => Arshavinel\ElleTherapy\View\Site::sentence('banner.text'),
    'tag'           => Arshavinel\ElleTherapy\View\Site::sentence('banner.pagina')
)) ?>

<div class="container margin-3rd-3rd">
    <div class="row">
        <div class="col-sm-7 col-md-8 col-lg-7">
            <?php
            if (!empty($_SESSION['appointments'])) { ?>
                <b class="text-color-2 mb-3 d-block">
                    <?= Arshavinel\ElleTherapy\View\Site::text('programări.făcute', array(
                        'appointments'  => $_SESSION['appointments'],
                        'email'         => '<a href="mailto:'.Arshavinel\ElleTherapy\Table\Config::title('email').'">'.Arshavinel\ElleTherapy\Table\Config::title('email').'</a>',
                        'contact'       => '<a target="_blank" href="'.Arshwell\Monolith\Web::url('site.contact').'">CONTACT</a>'
                    )) ?>
                </b>
            <?php } ?>

            <form action="<?= Arshwell\Monolith\Web::url('site.ajax.appoint') ?>">
                <div class="row">
                    <div class="col-md-6 mb-1 mb-sm-2">
                        <label><?= Arshavinel\ElleTherapy\View\Site::sentence('form.câmp.nume.label') ?> <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" name="lastname" value="<?= $form->value('lastname') ?>"
                        placeholder="<?= Arshavinel\ElleTherapy\View\Site::sentence('form.câmp.nume.placeholder') ?>" />
                        <span class="text-danger" form-error="lastname"></span>
                    </div>
                    <div class="col-md-6 mb-1 mb-sm-2">
                        <label><?= Arshavinel\ElleTherapy\View\Site::sentence('form.câmp.prenume.label') ?> <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" name="firstname" value="<?= $form->value('firstname') ?>"
                        placeholder="<?= Arshavinel\ElleTherapy\View\Site::sentence('form.câmp.prenume.placeholder') ?>" />
                        <span class="text-danger" form-error="firstname"></span>
                    </div>
                    <div class="col-md-6 mb-1 mb-sm-2">
                        <label><?= Arshavinel\ElleTherapy\View\Site::sentence('form.câmp.email.label') ?></label>
                        <input type="text" class="form-control" name="email" value="<?= $form->value('email') ?>"
                        placeholder="<?= Arshavinel\ElleTherapy\View\Site::sentence('form.câmp.email.placeholder') ?>" />
                        <span class="text-danger" form-error="email"></span>
                    </div>
                    <div class="col-md-6 mb-1 mb-sm-2">
                        <label><?= Arshavinel\ElleTherapy\View\Site::sentence('form.câmp.telefon.label') ?> <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" name="phone" value="<?= $form->value('phone') ?>"
                        placeholder="<?= Arshavinel\ElleTherapy\View\Site::sentence('form.câmp.telefon.placeholder') ?>" />
                        <span class="text-danger" form-error="phone"></span>
                    </div>
                    <div class="col-md-6 mb-1 mb-sm-2">
                        <label><?= Arshavinel\ElleTherapy\View\Site::sentence('form.câmp.serviciu.label') ?> <span class="text-danger">*</span></label>
                        <select class="custom-select" name="id_service">
                            <option <?= (empty($form->value('id_service')) ? 'selected' : '') ?> hidden>
                                <?= Arshavinel\ElleTherapy\View\Site::sentence('form.câmp.serviciu.placeholder') ?>
                            </option>
                            <?php
                            foreach ($services as $service) { ?>
                                <option value="<?= $service->id() ?>"
                                <?= ($form->value('id_service') == $service->id() ? 'selected' : '') ?>>
                                    <?= $service->translation('title') ?>
                                </option>
                            <?php } ?>
                        </select>
                        <span class="text-danger" form-error="id_service"></span>
                    </div>
                    <div class="col-md-6 mb-1 mb-sm-2">
                        <label><?= Arshavinel\ElleTherapy\View\Site::sentence('form.câmp.dată.label') ?></label>
                        <input type="date" class="form-control" name="date" value="<?= $form->value('date') ?>" />
                        <span class="text-danger" form-error="date"></span>
                    </div>
                    <div class="col-12 mb-2">
                        <label><?= Arshavinel\ElleTherapy\View\Site::sentence('form.câmp.mesaj.label') ?></label>
                        <textarea class="form-control" name="message"
                        placeholder="<?= Arshavinel\ElleTherapy\View\Site::sentence('form.câmp.mesaj.placeholder') ?>"><?= $form->value('message') ?></textarea>
                        <span class="text-danger" form-error="message"></span>
                    </div>
                </div>

                <div class="form-group form-check">
                    <input type="checkbox" class="form-check-input" name="privacy" value="1" id="contact-form--privacy" />
                    <label class="form-check-label" for="contact-form--privacy">
                        <?= Arshavinel\ElleTherapy\View\Site::sentence('form.politică', array(
                            'link' => '<a target="_blank" href="'. Arshwell\Monolith\Web::url('site.legal.privacy') .'">'.
                                Arshavinel\ElleTherapy\View\Site::sentence('form.politică.link.text') .
                            '</a>'
                        )) ?> <span class="text-danger">*</span>
                        <small class="text-danger" form-error="privacy"></small>
                    </label>
                </div>

                <input type="submit" class="btn-4-7 nowrap" value="<?= Arshavinel\ElleTherapy\View\Site::sentence('form.submit.text') ?>" />
                <div class="my-2">
                    <b class="d-inline-block text-color-2" data-response="message">
                        <?= Arshavinel\ElleTherapy\View\Site::sentence('form.răspuns') ?>
                    </b>
                </div>
            </form>
            <hr />
            <?= Arshavinel\ElleTherapy\View\Site::text('contactează-mă', array(
                'email'     => '<a href="mailto:'.Arshavinel\ElleTherapy\Table\Config::title('email').'">'.Arshavinel\ElleTherapy\Table\Config::title('email').'</a>',
                'contact'   => '<a target="_blank" href="'.Arshwell\Monolith\Web::url('site.contact').'">CONTACT</a>'
            )) ?>
        </div>
        <div class="col-sm-5 col-md-4 offset-lg-1">
            <hr class="d-sm-none" />
            <h5 class="text-center text-sm-left mb-3"><?= Arshavinel\ElleTherapy\View\Site::sentence('servicii') ?></h5>
            <?php
            foreach ($services as $service) { ?>
                <div class="padding-0-2nd">
                    <!-- <a target="_blank" href="<?= Arshwell\Monolith\Web::url('site.coaching.service', ['id'=>$service->id(),'slug'=>$service->translation('title')]) ?>"> -->
                        <?= Arshwell\Monolith\Piece::html('site/service/card', array(
                            'service' => $service
                        )) ?>
                    <!-- </a> -->
                </div>
            <?php } ?>
        </div>
    </div>
</div>
