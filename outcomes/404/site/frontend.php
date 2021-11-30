<?= Arsh\Core\Piece::html('site/banner', array(
    'background'    => Brain\View\Site::image('banner.background', 1400, 450),
    'sentence'      => Brain\View\Site::sentence('banner.text'),
    'tag'           => Brain\View\Site::sentence('banner.pagina')
)) ?>
