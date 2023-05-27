<?= Arshwell\Monolith\Piece::html('site/banner', array(
    'background'    => Arshavinel\ElleTherapy\View\Site::image('banner.imagine', 1400, 650),
    'half'          => true,
    'sentence'      => Arshavinel\ElleTherapy\View\Site::sentence('banner.text'),
    'tag'           => Arshavinel\ElleTherapy\View\Site::sentence('banner.pagina')
)) ?>

<div class="container margin-3rd-3rd">
    <div class="row">
        <div class="col-sm-7 col-md-8 col-lg-7">

            <link href="https://calendly.com/assets/external/widget.css" rel="stylesheet">
            <script type="text/javascript" src="https://assets.calendly.com/assets/external/widget.js"></script>

            <!-- Calendly inline widget -->
            <div class="calendly-inline-widget" data-url="https://calendly.com/elletherapy/30min?hide_landing_page_details=1&hide_gdpr_banner=1&hide_event_type_details=1" style="min-width: 320px; height: 620px;"></div>

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
                    <?= Arshwell\Monolith\Piece::html('site/service/card', array(
                        'service' => $service
                    )) ?>
                </div>
            <?php } ?>
        </div>
    </div>
</div>
