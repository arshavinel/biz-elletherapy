<!DOCTYPE html>
<!--[if lt IE 7]><html lang="ro" class="no-js lt-ie9 lt-ie8 lt-ie7"><![endif]-->
<!--[if (IE 7)&!(IEMobile)]><html lang="ro" class="no-js lt-ie9 lt-ie8"><![endif]-->
<!--[if (IE 8)&!(IEMobile)]><html lang="ro" class="no-js lt-ie9"><![endif]-->
<!--[if gt IE 8]><!--><html lang="ro" class="no-js"><!--<![endif]-->
<head>
    <title><?= Arshwell\Monolith\Meta::get('title') ?></title>

    <!-- favicon -->
    <link href="<?= ($_GLOBAL['logos'])->get('favicon_site')->url('tinny') ?>" rel="shortcut icon" type="image/png" />

    <meta charset="utf-8">
    <meta name="language" http-equiv="content-language" content="ro">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">

    <meta name="description" itemprop="description" content="<?= Arshwell\Monolith\Meta::get('description') ?>">
    <meta name="keywords" itemprop="keywords" content="<?= Arshwell\Monolith\Meta::get('keywords') ?>">

    <!-- enable meta robots for main domains only (not subdomains) -->
    <meta name="robots" content="<?= ((substr_count($_SERVER['HTTP_HOST'], '.') == 1) ? Arshwell\Monolith\Meta::get('robots') : 'noindex, nofollow') ?>" />
    <meta name="expires" content="never">
    <meta name="revisit-after" content="1 Days">

    <?php
    if (Arshwell\Monolith\Web::page()) {
        if (Arshwell\Monolith\Meta::exists('pages') && Arshwell\Monolith\Web::page() < Arshwell\Monolith\Meta::get('pages')) { ?>
    		<link rel="next" href="<?= Arshwell\Monolith\Web::url(Arshwell\Monolith\Web::key(), Arshwell\Monolith\Web::params(), Arshwell\Monolith\Web::language(), Arshwell\Monolith\Web::page()+1) ?>" />
    	<?php }
        if (Arshwell\Monolith\Web::page() > 1) { ?>
    		<link rel="prev" href="<?= Arshwell\Monolith\Web::url(Arshwell\Monolith\Web::key(), Arshwell\Monolith\Web::params(), Arshwell\Monolith\Web::language(), Arshwell\Monolith\Web::page()-1) ?>" />
    	<?php }
    }

    if (Arshwell\Monolith\Web::page() > 1 || !empty($_GET)) { ?>
        <link rel="canonical" href="<?= Arshwell\Monolith\Web::url(Arshwell\Monolith\Web::key(), Arshwell\Monolith\Web::params(), Arshwell\Monolith\Web::language()) ?>" />
    <?php } ?>

    [@css@]

    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600,300" rel="stylesheet" type="text/css">

    [@js-header@]
</head>
<body>
    <?php
    if (Arshwell\Monolith\Web::inGroup('site.events.promo') == false) { ?>
        <!-- Load Facebook SDK for JavaScript -->
        <div id="fb-root"></div>
        <script>
            window.fbAsyncInit = function() {
                FB.init({
                    xfbml:  true,
                    version:'v9.0'
                });
            };

            (function(d, s, id) {
                var js, fjs = d.getElementsByTagName(s)[0];
                if (d.getElementById(id)) return;
                js = d.createElement(s); js.id = id;
                js.src = 'https://connect.facebook.net/en_US/sdk/xfbml.customerchat.js';
                fjs.parentNode.insertBefore(js, fjs);
            }(document, 'script', 'facebook-jssdk'));
        </script>

        <!-- Your Chat Plugin code -->
        <div class="fb-customerchat" attribution="setup_tool" page_id="104066031068400"></div>
    <?php } ?>

    <nav class="navbar navbar-expand-lg navbar-dark">
        <a class="navbar-brand d-block" href="<?= Arshwell\Monolith\Web::url('site.home') ?>"
        target="<?= Arshwell\Monolith\Web::inGroup('site.events.promo') ? '_blank' : '_self' ?>">
            <img src="<?= ($_GLOBAL['logos'])->get('header')->url('small') ?>" />
        </a>

        <?php
        if (Arshwell\Monolith\Web::inGroup('site.events.promo') == false) { ?>
            <button class="navbar-toggler" type="button">
                <span class="navbar-toggler-icon"></span>
            </button>

            <ul class="navbar-nav ml-auto d-xl-flex align-items-center">
                <li class="nav-item">
                    <a class="nav-link <?= Arshwell\Monolith\Web::is('site.story') ? 'active' : '' ?>" href="<?= Arshwell\Monolith\Web::url('site.story') ?>">
                        POVESTEA MEA
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?= Arshwell\Monolith\Web::inGroup('site.blog') ? 'active' : '' ?>" href="<?= Arshwell\Monolith\Web::url('site.blog.all') ?>">
                        BLOG
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?= Arshwell\Monolith\Web::inGroup('site.services') ? 'active' : '' ?>" href="<?= Arshwell\Monolith\Web::url('site.services.all') ?>">
                        SERVICII
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?= Arshwell\Monolith\Web::is('site.contact') ? 'active' : '' ?>" href="<?= Arshwell\Monolith\Web::url('site.contact') ?>">
                        CONTACT
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link btn <?= Arshwell\Monolith\Web::is('site.appoint') ? 'active' : '' ?>" href="<?= Arshwell\Monolith\Web::url('site.appoint') ?>">
                        PROGRAMEAZĂ-TE
                    </a>
                </li>
            </ul>
        <?php } ?>
    </nav>

    <div id="app">
        [@frontend@]
    </div>

    <footer>
        <div class="container">
            <div class="row padding-3rd-3rd padding-md-2nd-2nd align-items-center text-center">
                <div class="col-lg text-lg-left">
                    <a href="<?= Arshwell\Monolith\Web::url('site.legal.terms') ?>" class="nowrap d-block d-sm-inline-block mr-sm-5">
                        Termeni și condiții
                    </a>
                    <a href="<?= Arshwell\Monolith\Web::url('site.legal.privacy') ?>" class="nowrap d-block d-sm-inline-block mr-sm-5">
                        Politica de confidențialitate
                    </a>
                    <a href="<?= Arshwell\Monolith\Web::url('site.legal.cookies') ?>" class="nowrap d-block d-sm-inline-block mr-sm-5">
                        Politica de cookies
                    </a>
                </div>
                <div class="col-lg-auto text-lg-right mt-2 mt-lg-0">
                    <?= \Arshwell\Monolith\Piece::html('site/copyright') ?>
                </div>
            </div>
        </div>
    </footer>

    [@js-footer@]
</body>
</html>
