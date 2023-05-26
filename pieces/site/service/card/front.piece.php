<div class="box">
    <div class="background-image" style="background-image: url(<?= $service->file('preview')->url('medium') ?>);"></div>
    <div class="text">
        <h5><?= $service->translation('title') ?></h5>
        <small><b class="my-2 d-block"><?= $service->translation('price') ?></b></small>
        <p class="mb-1">
            <?= Arshwell\Monolith\Text::removeAllTags($service->translation('description')) ?>
        </p>
    </div>
</div>
