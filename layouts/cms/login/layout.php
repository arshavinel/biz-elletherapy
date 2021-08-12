<!DOCTYPE html>
<html lang="ro">
<head>
    <title><?= Arsh\Core\Meta::get('title') ?></title>
    <?php
    if (Arsh\Core\Meta::exists('description')) { ?>
        <meta name="description" itemprop="description" content="<?= Arsh\Core\Meta::get('description') ?>">
    <?php } ?>

    <meta http-equiv="content-type" content="text/html;charset=utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="noindex,nofollow" />

    [@css@]

    [@js-header@]

    <link href="<?= $cms_config['content']['favicon'] ?>" rel="shortcut icon" type="image/png" />
</head>
<body>
    [@frontend@]

    [@js-footer@]
</body>
</html>
