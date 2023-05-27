<div class="box">
    <?php
    if ($service->file('preview')) { ?>
        <div class="service--bg-image" style="background-image: url(<?= $service->file('preview')->url('medium') ?>);"></div>
    <?php } ?>
    <div class="service--text">
        <h6 style="font-size: smaller;">
            <?= $service->translation('title') ?>
        </h6>
        <small class="service--description mt-1">
            <?= Arshwell\Monolith\Text::chars(
                Arshwell\Monolith\Text::removeAllTags($service->translation('description')),
                300
            ) ?>
        </small>
    </div>
</div>
