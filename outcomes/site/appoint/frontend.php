<?= Arshwell\Monolith\Piece::html('site/banner', array(
    'background'    => Arshavinel\ElleTherapy\View\Site::image('banner.imagine', 1400, 650),
    'half'          => true,
    'sentence'      => Arshavinel\ElleTherapy\View\Site::sentence('banner.text'),
    'tag'           => Arshavinel\ElleTherapy\View\Site::sentence('banner.pagina')
)) ?>

<div class="container margin-3rd-3rd">
    <div>
        <?= Arshavinel\ElleTherapy\View\Site::content('box.text') ?>
    </div>

    <hr />

    <?= Arshavinel\ElleTherapy\View\Site::text('contactează-mă', array(
        'email'     => '<a href="mailto:'.Arshavinel\ElleTherapy\Table\Config::title('email').'">'.Arshavinel\ElleTherapy\Table\Config::title('email').'</a>',
        'contact'   => '<a target="_blank" href="'.Arshwell\Monolith\Web::url('site.contact').'">CONTACT</a>'
    )) ?>
</div>
