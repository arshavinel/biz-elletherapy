<!DOCTYPE html>
<!--[if lt IE 7]><html lang="ro" class="no-js lt-ie9 lt-ie8 lt-ie7"><![endif]-->
<!--[if (IE 7)&!(IEMobile)]><html lang="ro" class="no-js lt-ie9 lt-ie8"><![endif]-->
<!--[if (IE 8)&!(IEMobile)]><html lang="ro" class="no-js lt-ie9"><![endif]-->
<!--[if gt IE 8]><!--><html lang="ro" class="no-js"><!--<![endif]-->
<head>
    <meta charset="utf-8">
    <meta name="language" http-equiv="content-language" content="ro">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">

    <title><?= Arsh\Core\Meta::get('title') ?></title>
    <?php
    if (Arsh\Core\Meta::exists('description')) { ?>
        <meta name="description" itemprop="description" content="<?= Arsh\Core\Meta::get('description') ?>">
    <?php }
    if (Arsh\Core\Meta::exists('keywords')) { ?>
        <meta name="keywords" itemprop="keywords" content="<?= Arsh\Core\Meta::get('keywords') ?>">
    <?php } ?>
    <meta name="expires" content="never">
    <meta name="revisit-after" content="1 Days">

    <meta name="robots" content="<?= (!Arsh\Core\ENV::board('dev') && Arsh\Core\Meta::exists('robots') ? Arsh\Core\Meta::get('robots') : 'noindex, nofollow') ?>" />

    [@css@]

    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600,300" rel="stylesheet" type="text/css">

    [@js-header@]

    <link href="<?= (new Arsh\Core\Table\Files\Image('Brain\Table\Logo', Brain\Table\Logo::field('id_logo', "visible = 1"), 'favicon_site'))->url('tinny') ?>"
    rel="shortcut icon" type="image/png" />
</head>
<body>
    <div id="app" class="text-center">
        [@frontend@]
    </div>

    [@js-footer@]
</body>
</html>
