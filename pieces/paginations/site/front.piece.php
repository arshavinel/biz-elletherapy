<div class="text-center margin-3rd-3rd">
    <ul class="pagination justify-content-center">
        <?php
        foreach ($links as $link) { ?>
            <li class="page-item <?= ($link['active'] ? 'active' : '') ?> <?= ($link['class'] ?? '') ?>">
                <?php
                if ($link['active']) { ?>
                    <span class="page-link">
                        <?= $link['title'] ?>
                        <span class="sr-only">(current)</span>
                    </span>
                <?php }
                else { ?>
                    <a href="<?= $link['url'] ?>" class="page-link">
                        <?= $link['title'] ?>
                    </a>
                <?php } ?>
            </li>
        <?php } ?>
    </ul>
</div>
