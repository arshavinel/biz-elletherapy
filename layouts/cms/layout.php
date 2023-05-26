<!DOCTYPE html>
<!--[if lt IE 7]><html lang="<?= Arshavinel\ElleTherapy\Language\LangCMS::get() ?>" class="no-js lt-ie9 lt-ie8 lt-ie7"><![endif]-->
<!--[if (IE 7)&!(IEMobile)]><html lang="<?= Arshavinel\ElleTherapy\Language\LangCMS::get() ?>" class="no-js lt-ie9 lt-ie8"><![endif]-->
<!--[if (IE 8)&!(IEMobile)]><html lang="<?= Arshavinel\ElleTherapy\Language\LangCMS::get() ?>" class="no-js lt-ie9"><![endif]-->
<!--[if gt IE 8]><!--><html lang="<?= Arshavinel\ElleTherapy\Language\LangCMS::get() ?>" class="no-js"><!--<![endif]-->
<head>
    <title><?= Arshwell\Monolith\Meta::get('title') ?> | CMS</title>

    <!-- favicon -->
    <link href="<?= $_CMS_CONFIG['content']['favicon'] ?>" rel="shortcut icon" type="image/png" />

    <meta charset="UTF-8">
    <meta name="language" http-equiv="content-language" content="<?= Arshavinel\ElleTherapy\Language\LangCMS::get() ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta http-equiv="Content-type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1.0,maximum-scale=1.0,user-scalable=no">

    <?php
    if (Arshwell\Monolith\Meta::exists('description')) { ?>
        <meta name="description" itemprop="description" content="<?= Arshwell\Monolith\Meta::get('description') ?>">
    <?php } ?>

    <meta name="robots" content="noindex,nofollow" />
    <meta name="googlebot" content="notranslate">

    <!-- Google Identity Auth -->
    <script src="https://accounts.google.com/gsi/client"></script>

    [@css@]

    [@js-header@]
</head>
<body>
    <?php
    if (empty($_GET['iframe']) || $_GET['iframe'] != 1) { ?>
        <nav class="navbar-expand-md navbar-dark">
            <div class="navbar position-relative w-100 d-flex">
                <a class="navbar-brand" href="<?= Arshwell\Monolith\Web::url($_CMS_CONFIG['content']['routes']['cms']) ?>">
                    <?= \Arshwell\Monolith\Piece::html("header-logo", [
                        'logo' => [
                            'file'  => $_GLOBAL['logos']->get('header'),
                            'text'  => $_CMS_CONFIG['content']['title'],
                        ],
                        'appEnv' => $_GLOBAL['appEnv'],
                    ]) ?>
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#CMSNavbarDropdown">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse mt-2 pt-2 mt-md-0 pt-md-0" id="CMSNavbarDropdown">
                    <div class="row no-gutters w-100 align-items-center justify-content-md-end">
                        <?php
                        if (Arshavinel\ElleTherapy\Table\Account\Admin\Profile::auth('id_role') == 1) { ?>
                            <div class="col-auto my-1">
                                <div class="dropdown">
                                    <a type="button" class="icon" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i aria-hidden="true" class="fa fa-fw fa-user-friends"></i>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-md-center mt-1">
                                        <a class="dropdown-item" href="<?= Arshwell\Monolith\Web::url($_CMS_CONFIG['content']['routes']['admins']) ?>">
                                            <i aria-hidden="true" class="fa fa-fw fa-user-friends"></i>
                                            Admins
                                        </a>
                                        <a class="dropdown-item disabled" href="">
                                            <i aria-hidden="true" class="fa fa-fw fa-users"></i>
                                            Groups
                                        </a>
                                        <a class="dropdown-item" href="<?= Arshwell\Monolith\Web::url($_CMS_CONFIG['content']['routes']['logs']) ?>">
                                            <i aria-hidden="true" class="fa fa-fw fa-sign-in-alt"></i>
                                            Logs
                                        </a>
                                        <a class="dropdown-item disabled" href="">
                                            <i aria-hidden="true" class="fa fa-fw fa-history"></i>
                                            Actions
                                        </a>
                                    </div>
                                </div>
                            </div>
                        <?php } ?>
                        <div class="col-auto my-1">
                            <a class="icon" href="<?= Arshwell\Monolith\Web::url($_CMS_CONFIG['content']['routes']['site']) ?>" target="_blank"
                            data-toggle="tooltip" data-container="body" data-placement="bottom" title="See website">
                                <i aria-hidden="true" class="fa fa-fw fa-share"></i>
                            </a>
                        </div>
                        <div class="d-none d-md-block col-md-auto">
                            <div class="bg-color-3" style="width: 1px; height: 35px;"></div>
                        </div>
                        <div class="col-auto mt-3 mt-md-0 ml-auto ml-md-3">
                            <div class="dropdown">
                                <div data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <div class="media">
                                        <img class="align-self-center mr-3 rounded" src="<?= (new Arshwell\Monolith\Table\Files\Image(Arshavinel\ElleTherapy\Table\Account\Admin\Profile::class, Arshavinel\ElleTherapy\Table\Account\Admin\Profile::auth('id_profile'), 'avatar'))->smallest() ?>" />
                                        <div class="media-body align-self-center">
                                            <span class="name"><?= Arshavinel\ElleTherapy\Table\Account\Admin\Profile::auth('name') ?></span>
                                            <span class="group"><?= Arshavinel\ElleTherapy\Table\Account\Admin\Profile::auth('role') ?></span>
                                        </div>
                                    </div>
                                    <i class="fa fa-2x fa-fw fa-caret-down"></i>
                                </div>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <a class="dropdown-item" href="<?= Arshwell\Monolith\Web::url($_CMS_CONFIG['content']['routes']['admins']) ?>?ftr=update&id=<?= Arshavinel\ElleTherapy\Table\Account\Admin\Profile::auth('id_profile') ?>">
                                        <i aria-hidden="true" class="fa fa-fw fa-user"></i>
                                        Date cont
                                    </a>
                                    <form method="POST" action="<?= Arshwell\Monolith\Web::url($_CMS_CONFIG['content']['routes']['logout']) ?>">
                                        <?= Arshwell\Monolith\HTML::formToken() ?>
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
                                class="list-group list-group-flush collapse <?= ($preid == 'nm' || Arshwell\Monolith\Web::is($subroutes) ? 'show' : '') ?>">
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
                                                if ((!empty($link['route']) && Arshwell\Monolith\Web::is($link['route'])
                                                || !empty($link['group']) && Arshwell\Monolith\Web::inGroup($link['group']))) {
                                                    $link_class .= " active";
                                                }
                                                ?>
                                                <a href="<?= $link['href'] ?? Arshwell\Monolith\Web::url($link['route']) ?>"
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
                                                            Arshwell\Monolith\Web::group($value)
                                                        );
                                                    }
                                                });

                                                if (Arshwell\Monolith\Web::is($subroutes)) {
                                                    $link_class .= " active-parent";
                                                }
                                                ?>
                                                <a href="<?= '#'.$preid.'-'.$i ?>" style="padding-left: <?= $layers*19?>px;" class="<?= $link_class ?>"
                                                data-toggle="collapse" aria-expanded="<?= (Arshwell\Monolith\Web::is($subroutes) ? 'true' : 'false') ?>"
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
                            <?php $fn_menu($_CMS_CONFIG['menu']); ?>
                        </div>
                    </div>
                </div>
            </div>
        </nav>

        <div class="container-fluid">
            <div class="row">
                <div class="offset-md-3 col-md-9 offset-lg-2 col-lg-10 padding-0-2nd">
                    <div id="app">
                        [@frontend@]

                        <div class="padding-2nd-1st">
                            <hr>
                            <?= \Arshwell\Monolith\Piece::html('cms/copyright') ?>
                        </div>
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
