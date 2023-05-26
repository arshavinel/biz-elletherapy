<!DOCTYPE html>
<html lang="<?= Arshavinel\ElleTherapy\Language\LangCMS::get() ?>">
<head>
    <title><?= Arshwell\Monolith\Meta::get('title') ?></title>
    <?php
    if (Arshwell\Monolith\Meta::exists('description')) { ?>
        <meta name="description" itemprop="description" content="<?= Arshwell\Monolith\Meta::get('description') ?>">
    <?php } ?>

    <meta http-equiv="content-type" content="text/html;charset=utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="noindex,nofollow" />

    <!-- Google Identity Auth -->
    <script src="https://accounts.google.com/gsi/client"></script>

    [@css@]

    [@js-header@]

    <link href="<?= $_CMS_CONFIG['content']['favicon'] ?>" rel="shortcut icon" type="image/png" />
</head>
<body>
    [@frontend@]

    [@js-footer@]
</body>
</html>
