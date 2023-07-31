<div <?= ($piece['homepage'] ? 'class="background-piece" style="background-image: url('. Arshavinel\ElleTherapy\View\Site::image('servicii.background', 1400, 1000) .');"' : '') ?>>
    <div class="container text-center padding-3rd-6th">
        <div class="row justify-content-center">
            <?php
            foreach ($services as $service) { ?>
                <div class="col-12 padding-4th-4th">
                    <div class="row">
                        <div class="col-6 col-md-4">
                            <div class="background-image" style="background-image: url(<?= $service->file('preview')->url('medium') ?>);">
                                <h5><?= $service->translation('title') ?></h5>
                            </div>
                        </div>
                        <div class="col-6 col-md-8">
                            <?php
                            if ($service->translation('price')) { ?>
                                <b class="my-2 d-block"><?= $service->translation('price') ?></b>
                            <?php } ?>
                            <div class="box">
                                <p class="mb-1">
                                    <?= Arshwell\Monolith\Text::removeAllTags($service->translation('description')) ?>
                                </p>
                            </div>
                            <?php
                            if ($service->has_page) { ?>
                                <a class="btn btn-sm <?= ($piece['homepage'] ? 'btn-7-4' : 'btn-4-7') ?>"
                                href="<?= Arshwell\Monolith\Web::url('site.services.one', ['id'=>$service->id(),'slug'=>$service->translation('title')]) ?>">
                                    <?= Arshavinel\ElleTherapy\View\Site::sentence('serviciu.link.text', NULL, true) ?>
                                </a>
                            <?php }
                            else { ?>
                                <button class="btn btn-sm text-color-2">
                                    <span><?= Arshavinel\ElleTherapy\View\Site::sentence('buton.extinde', NULL, true) ?></span>
                                    <span class="d-none"><?= Arshavinel\ElleTherapy\View\Site::sentence('buton.restrânge', NULL, true) ?></span>
                                </button>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
        <a class="btn <?= ($piece['homepage'] ? 'btn-7-4' : 'btn-4-7') ?> mt-3" href="<?= $piece['button']['link'] ?>">
            <?= $piece['button']['text'] ?>
        </a>
    </div>
</div>
