<div class="container text-center">
    <h1 class="mb-md-4"><?= Brain\View\Site::sentence('comparare-industrii.titlu', NULL, true) ?></h1>
    <div class="row bg-color-5 text-color-6 text-left">
        <?php
        // between 2 & 4
        $items_per_row = array(
            'md' => Brain\Table\Config::title('industries_per_row__md'),
            'lg' => Brain\Table\Config::title('industries_per_row__lg'),
            'xl' => Brain\Table\Config::title('industries_per_row__xl')
        );

        foreach ($industries as $i => $industry) { ?>
            <div class="col-12 col-md px-5 py-4">
                <h2 class="text-color-7"><b><?= $industry->translation('title') ?></b></h2>
                <?php
                foreach ($industry->characteristics['visible'] as $characteristic) { ?>
                    <div class="characteristic">
                        <?= $characteristic->translation('text') ?>
                    </div>
                <?php }

                if ($industry->characteristics['hidden']) { ?>
                    <div class="collapse" id="comparison--industry-<?= $i ?>">
                        <hr class="bg-color-6" />
                        <?php
                        foreach ($industry->characteristics['hidden'] as $characteristic) { ?>
                            <div class="characteristic">
                                <?= $characteristic->translation('text') ?>
                            </div>
                        <?php } ?>
                        <hr class="bg-color-6" />
                    </div>
                    <a data-toggle="collapse" href="#comparison--industry-<?= $i ?>" role="button" aria-expanded="false" aria-controls="comparison--industry-<?= $i ?>">
                        citește mai
                        <span class="comparison--industry-read-text">mult</span>
                        <span class="comparison--industry-read-text d-none">puțin</span>
                    </a>
                <?php } ?>
            </div>
            <?php
            if ($i < (count($industries) - 1)) { ?>
                <div class="col-12 <?= implode(' ', call_user_func(function ($ipr) use ($i) {
                    foreach ($ipr as $rezolution => &$items) {
                        $items = (($i+1) % $items == 0 ? "d-$rezolution-none" : "d-$rezolution-block col-$rezolution-auto");

                        unset($items);
                    }

                    return $ipr;
                }, $items_per_row)) ?> py-md-4">
                    <div class="h-100 border border-color-7"></div>
                </div>
                <div class="w-100 d-none <?= implode(' ', call_user_func(function ($ipr) use ($i) {
                    foreach ($ipr as $rezolution => &$items) {
                        $items = (($i+1) % $items == 0 ? "d-$rezolution-block" : "d-$rezolution-none");

                        unset($items);
                    }

                    return $ipr;
                }, $items_per_row)) ?>"></div>
            <?php }
        } ?>
    </div>
</div>
