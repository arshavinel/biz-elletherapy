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

    <title><?= App\Core\Meta::get('title') ?></title>
    <?php
    if (App\Core\Meta::exists('description')) { ?>
        <meta name="description" itemprop="description" content="<?= App\Core\Meta::get('description') ?>">
    <?php }
    if (App\Core\Meta::exists('keywords')) { ?>
        <meta name="keywords" itemprop="keywords" content="<?= App\Core\Meta::get('keywords') ?>">
    <?php } ?>
    <meta name="expires" content="never">
    <meta name="revisit-after" content="1 Days">

    <meta name="robots" content="<?= (!App\Core\ENV::board('dev') && App\Core\Meta::exists('robots') ? App\Core\Meta::get('robots') : 'noindex, nofollow') ?>" />

    [@css@]

    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600,300" rel="stylesheet" type="text/css">

    [@js-header@]

    <link href="<?= (new App\Core\Table\Files\Image('App\Tables\Logo', App\Tables\Logo::field('id_logo', "visible = 1"), 'favicon_site'))->url('tinny') ?>"
    rel="shortcut icon" type="image/png" />
</head>
<body>
    <div id="app" class="text-center">
        [@frontend@]
    </div>

    [@js-footer@]
</body>
</html>
