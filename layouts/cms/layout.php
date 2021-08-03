<!DOCTYPE html>
<!--[if lt IE 7]><html lang="ro" class="no-js lt-ie9 lt-ie8 lt-ie7"><![endif]-->
<!--[if (IE 7)&!(IEMobile)]><html lang="ro" class="no-js lt-ie9 lt-ie8"><![endif]-->
<!--[if (IE 8)&!(IEMobile)]><html lang="ro" class="no-js lt-ie9"><![endif]-->
<!--[if gt IE 8]><!--><html lang="ro" class="no-js"><!--<![endif]-->
<head>
    <meta charset="UTF-8">
    <meta name="language" http-equiv="content-language" content="ro">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta http-equiv="Content-type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1.0,maximum-scale=1.0,user-scalable=no">

    <title>CMS - <?= App\Core\Meta::get('title') ?></title>
    <?php
    if (App\Core\Meta::exists('description')) { ?>
        <meta name="description" itemprop="description" content="<?= App\Core\Meta::get('description') ?>">
    <?php } ?>

    <meta name="robots" content="noindex,nofollow" />

    [@css@]

    [@js-header@]

    <link href="<?= $cms_config['content']['favicon'] ?>" rel="shortcut icon" type="image/png" />
</head>
<body>
    <?php
    if (empty($_GET['iframe']) || $_GET['iframe'] != 1) { ?>
        <nav class="navbar fixed-top navbar-expand-md navbar-dark">
            <a class="navbar-brand" href="<?= App\Core\Web::url($cms_config['content']['routes']['cms']) ?>">
                <?= $cms_config['content']['title'] ?>
                <?php
                if ($cms_config['content']['demo']) { ?>
                    <sup class="badge badge-danger text-monospace font-weight-light text-capitalize" title="Te afli în varianta demo">DEMO</sup>
                <?php } ?>
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#CMSNavbarDropdown">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse mt-2 pt-2 mt-md-0 pt-md-0" id="CMSNavbarDropdown">
                <div class="row no-gutters w-100 align-items-center justify-content-md-end">
                    <?php
                    if (App\Tables\CMS\Admin::auth('id_cms_role') == 1) { ?>
                        <div class="col-auto">
                            <div class="dropdown">
                                <a type="button" class="icon" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i aria-hidden="true" class="fa fa-fw fa-user-friends"></i>
                                </a>
                                <div class="dropdown-menu dropdown-menu-md-center mt-1">
                                    <a class="dropdown-item" href="<?= App\Core\Web::url($cms_config['content']['routes']['admins']) ?>">
                                        <i aria-hidden="true" class="fa fa-fw fa-user-friends"></i>
                                        Useri
                                    </a>
                                    <a class="dropdown-item disabled" href="">
                                        <i aria-hidden="true" class="fa fa-fw fa-users"></i>
                                        Grupuri
                                    </a>
                                    <a class="dropdown-item disabled" href="">
                                        <i aria-hidden="true" class="fa fa-fw fa-sign-in-alt"></i>
                                        Logări
                                    </a>
                                    <a class="dropdown-item disabled" href="">
                                        <i aria-hidden="true" class="fa fa-fw fa-history"></i>
                                        Acțiuni
                                    </a>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                    <div class="col-auto">
                        <a class="icon" href="<?= App\Core\Web::url($cms_config['content']['routes']['site']) ?>" target="_blank"
                        data-toggle="tooltip" data-container="body" data-placement="bottom" title="Vezi site-ul">
                            <i aria-hidden="true" class="fa fa-fw fa-share"></i>
                        </a>
                    </div>
                    <div class="d-none d-md-block col-md-auto">
                        <div class="bg-color-3" style="width: 1px; height: 35px;"></div>
                    </div>
                    <div class="col-auto ml-auto ml-md-3">
                        <div class="dropdown">
                            <div data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="name"><?= App\Tables\CMS\Admin::auth('name') ?></span>
                                <span class="group"><?= App\Tables\CMS\Admin::auth('role') ?></span>
                                <i class="fa fa-2x fa-fw fa-caret-down"></i>
                            </div>
                            <div class="dropdown-menu dropdown-menu-right">
                                <a class="dropdown-item" href="<?= App\Core\Web::url($cms_config['content']['routes']['admins']) ?>?ftr=update&id=<?= App\Tables\CMS\Admin::auth('id_cms_admin') ?>">
                                    <i aria-hidden="true" class="fa fa-fw fa-user"></i>
                                    Date cont
                                </a>
                                <form method="POST" action="<?= App\Core\Web::url($cms_config['content']['routes']['logout']) ?>">
                                    <?= App\Core\HTML::formToken() ?>
                                    <button type="submit" class="dropdown-item">
                                        <i aria-hidden="true" class="fa fa-fw fa-sign-out-alt"></i>
                                        Deloghează-te
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-2 col-md-3 pb-md-3" id="navigation-menu">
                        <?php
                        $fn_menu = function (array $links, string $preid = 'nm', int $layers = 1, array $subroutes = array()) use (&$fn_menu): void { ?>
                            <div id="<?= $preid ?>"
                            class="list-group list-group-flush collapse <?= ($preid == 'nm' || App\Core\Web::is($subroutes) ? 'show' : '') ?>">
                                <?php
                                foreach ($links as $i => $link) {
                                    if (!isset($link['visible']) || $link['visible'] == true) {
                                        $link_class = "list-group-item";

                                        if (!empty($link['disabled']) && $link['disabled'] == true) {
                                            $link_class .= " disabled";
                                        }
                                        if (!empty($link['color'])) {
                                            $link_class .= " text-".$link['color'];
                                        }

                                        switch ($link['icon']['style'] ?? NULL) {
                                            case NULL:
                                            case 'solid': {
                                                $fa_class = 'fas';
                                                break;
                                            }
                                            case 'regular': {
                                                $fa_class = 'far';
                                                break;
                                            }
                                            case 'brand': {
                                                $fa_class = 'fab';
                                                break;
                                            }
                                        }

                                        if (empty($link['links'])) {
                                            if ((!empty($link['route']) && App\Core\Web::is($link['route'])
                                            || !empty($link['group']) && App\Core\Web::inGroup($link['group']))) {
                                                $link_class .= " active";
                                            }
                                            ?>
                                            <a href="<?= $link['href'] ?? App\Core\Web::url($link['route']) ?>"
                                            style="padding-left: <?= $layers*19?>px;" class="<?= $link_class ?>"
                                            <?= (!empty($link['tooltip']) ? 'data-toggle="tooltip" data-placement="right" title="'.$link['tooltip'].'"' : '') ?>>
                                                <i class="<?= $fa_class ?> fa-fw fa-<?= $link['icon']['name'] ?? $link['icon'] ?>"></i>
                                                <?= $link['text'] ?>
                                                <?php
                                                if (!empty($link['badge']) && !empty($link['badge']['class']) && !empty($link['badge']['text'])) { ?>
                                                    <span class="float-right">
                                                        <span class="badge badge-pill badge-<?= $link['badge']['class'] ?>">
                                                            <?= $link['badge']['text'] ?>
                                                        </span>
                                                    </span>
                                                <?php } ?>
                                            </a>
                                        <?php }
                                        else {
                                            $subroutes = array();

                                            array_walk_recursive($link['links'], function ($value, $key) use (&$subroutes) {
                                                if ($key == 'route') {
                                                    $subroutes[] = $value;
                                                }
                                                else if ($key == 'group') {
                                                    $subroutes = array_merge(
                                                        $subroutes,
                                                        App\Core\Web::group($value)
                                                    );
                                                }
                                            });

                                            if (App\Core\Web::is($subroutes)) {
                                                $link_class .= " active-parent";
                                            }
                                            ?>
                                            <a href="<?= '#'.$preid.'-'.$i ?>" style="padding-left: <?= $layers*19?>px;" class="<?= $link_class ?>"
                                            data-toggle="collapse" aria-expanded="<?= (App\Core\Web::is($subroutes) ? 'true' : 'false') ?>"
                                            <?= (!empty($link['tooltip']) ? 'data-toggle="tooltip" data-placement="right" title="'.$link['tooltip'].'"' : '') ?>>
                                                <i class="<?= $fa_class ?> fa-fw fa-<?= $link['icon']['name'] ?? $link['icon'] ?>"></i>
                                                <?= $link['text'] ?>
                                                <i aria-hidden="true" class="fas fa-caret-down"></i>
                                                <?php
                                                if (!empty($link['badge']) && !empty($link['badge']['class']) && !empty($link['badge']['text'])) { ?>
                                                    <span class="float-right">
                                                        <span class="badge badge-pill badge-<?= $link['badge']['class'] ?>">
                                                            <?= $link['badge']['text'] ?>
                                                        </span>
                                                    </span>
                                                <?php } ?>
                                            </a>

                                            <?php
                                            if (!empty($link['links'])) {
                                                $fn_menu($link['links'], $preid.'-'.$i, $layers+1, $subroutes);
                                            }
                                        }
                                    }
                                } ?>
                            </div>
                        <?php } ?>

                        <!-- Sidebar -->
                        <?php $fn_menu($cms_config['menu']); ?>
                    </div>
                </div>
            </div>
        </nav>

        <div class="container-fluid">
            <div class="row">
                <div class="offset-md-3 col-md-9 offset-lg-2 col-lg-10 padding-0-2nd">
                    <div id="app">
                        [@frontend@]

                        <?php
                        if ($cms_config['content']['copyright'] && !App\Core\Web::inGroup('404')) { ?>
                            <div id="cms-copyright" class="padding-2nd-1st">
                                <span class="text-danger">
                                    <span class="text-muted">©</span> <b>CMS</b> dezvoltat de echipa
                                    <a class="text-color-7" target="_blank" href="https://iscreambrands.ro">iscreambrands</a>.
                                </span>
                                <span class="text-muted nowrap">Toate drepturile rezervate.</span>
                            </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    <?php }
    else { ?>
        [@frontend@]
    <?php } ?>

    [@js-footer@]
</body>
</html>
