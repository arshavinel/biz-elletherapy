<div class="header-logo--container">
    <?php
    if ($logo['file']) { ?>
        <img class="header-logo--image type--<?= $appEnv ?>"
        src="<?= $logo['file'] ?>" alt="<?= $logo['text'] ?>" />
    <?php }
    else {
        echo $logo['text'];
    } ?>

    <?php
    if ('live' != $appEnv) { ?>
        <span class="header-logo--app-badge" title="You are in a Work version">
            <?= ucfirst($appEnv) ?>
        </span>
    <?php } ?>
</div>
