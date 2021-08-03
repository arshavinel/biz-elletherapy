<div class="section-banner section-banner--with-<?= (!empty($piece['image']) ? 'image' : 'text') ?> <?= !empty($piece['half']) ? 'section-banner--half' : '' ?>"
style="background-image: url(<?= $piece['background'] ?>);">
    <div class="overlay">
        <div class="<?= (!empty($piece['image']) ? 'container-fluid' : 'container') ?>">
            <?php
            if (!empty($piece['image'])) { ?>
                <img src="<?= $piece['image'] ?>" width="100%" />
            <?php }
            if (!empty($piece['sentence'])) { ?>
                <h1 class="sentence"><?= $piece['sentence'] ?></h1>
            <?php }
            if (!empty($piece['tag'])) { ?>
                <p class="tag"><?= $piece['tag'] ?></p>
            <?php } ?>
		</div>
        <div class="arrows-down-animated"></div>
    </div>
</div>
