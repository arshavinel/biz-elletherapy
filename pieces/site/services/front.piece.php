<div <?= ($piece['homepage'] ? 'class="background-piece" style="background-image: url('. Brain\View\Site::image('servicii.background', 1400, 1000) .');"' : '') ?>>
    <div class="container text-center padding-3rd-6th">
        <div class="row">
            <?php
            foreach ($services as $service) { ?>
                <div class="col-sm-4 padding-4th-4th">
                    <div class="background-image" style="background-image: url(<?= $service->file('preview')->url('medium') ?>);">
                        <h5><?= $service->translation('title') ?></h5>
                    </div>
                    <b class="my-2 d-block"><?= $service->translation('price') ?></b>
                    <div class="box">
                        <p class="mb-1">
                            <?= Arsh\Core\Text::removeAllTags($service->translation('description')) ?>
                        </p>
                    </div>
                    <?php
                    if ($service->has_page) { ?>
                        <a class="btn btn-sm <?= ($piece['homepage'] ? 'btn-7-4' : 'btn-4-7') ?>"
                        href="<?= Arsh\Core\Web::url('site.coaching.service', ['id'=>$service->id(),'slug'=>$service->translation('title')]) ?>">
                            <?= Brain\View\Site::sentence('serviciu.link.text', NULL, true) ?>
                        </a>
                    <?php }
                    else { ?>
                        <button class="btn btn-sm text-color-2">
                            <span><?= Brain\View\Site::sentence('buton.extinde', NULL, true) ?></span>
                            <span class="d-none"><?= Brain\View\Site::sentence('buton.restrânge', NULL, true) ?></span>
                        </button>
                    <?php } ?>
                </div>
            <?php } ?>
        </div>
        <a class="btn <?= ($piece['homepage'] ? 'btn-7-4' : 'btn-4-7') ?> mt-3" href="<?= $piece['button']['link'] ?>">
            <?= $piece['button']['text'] ?>
        </a>
    </div>
</div>
