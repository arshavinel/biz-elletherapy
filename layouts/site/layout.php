<!DOCTYPE html>
<!--[if lt IE 7]><html lang="ro" class="no-js lt-ie9 lt-ie8 lt-ie7"><![endif]-->
<!--[if (IE 7)&!(IEMobile)]><html lang="ro" class="no-js lt-ie9 lt-ie8"><![endif]-->
<!--[if (IE 8)&!(IEMobile)]><html lang="ro" class="no-js lt-ie9"><![endif]-->
<!--[if gt IE 8]><!--><html lang="ro" class="no-js"><!--<![endif]-->
<head>
    <meta charset="utf-8">
    <meta name="language" http-equiv="content-language" content="ro">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">

    <title><?= App\Core\Meta::get('title') ?></title>
    <meta name="description" itemprop="description" content="<?= App\Core\Meta::get('description') ?>">
    <meta name="keywords" itemprop="keywords" content="<?= App\Core\Meta::get('keywords') ?>">
    <meta name="expires" content="never">
    <meta name="revisit-after" content="1 Days">

    <meta name="robots" content="<?= (!App\Core\ENV::board('dev') ? App\Core\Meta::get('robots') : 'noindex, nofollow') ?>" />

    <?php
    if (App\Core\Web::page()) {
        if (App\Core\Meta::exists('pages') && App\Core\Web::page() < App\Core\Meta::get('pages')) { ?>
    		<link rel="next" href="<?= App\Core\Web::url(App\Core\Web::key(), App\Core\Web::params(), App\Core\Web::language(), App\Core\Web::page()+1) ?>" />
    	<?php }
        if (App\Core\Web::page() > 1) { ?>
    		<link rel="prev" href="<?= App\Core\Web::url(App\Core\Web::key(), App\Core\Web::params(), App\Core\Web::language(), App\Core\Web::page()-1) ?>" />
    	<?php }
    }

    if (App\Core\Web::page() > 1 || !empty($_GET)) { ?>
        <link rel="canonical" href="<?= App\Core\Web::url(App\Core\Web::key(), App\Core\Web::params(), App\Core\Web::language()) ?>" />
    <?php } ?>

    [@css@]

    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600,300" rel="stylesheet" type="text/css">

    [@js-header@]

    <?php
    if (empty(App\Core\ENV::root()) && App\Core\ENV::board('dev') == false) { ?>
        <!-- Global site tag (gtag.js) - Google Analytics -->
        <script async src="https://www.googletagmanager.com/gtag/js?id=G-MPL6JDEQ9L"></script>
        <script>
            window.dataLayer = window.dataLayer || [];
            function gtag(){dataLayer.push(arguments);}
            gtag('js', new Date());

            gtag('config', 'G-MPL6JDEQ9L');
        </script>
    <?php } ?>

    <link href="<?= ($global['logos'])->get('favicon_site')->url('tinny') ?>" rel="shortcut icon" type="image/png" />
</head>
<body>
    <?php
    if (App\Core\Web::inGroup('site.events.promo') == false) { ?>
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
        <a class="navbar-brand d-block" href="<?= App\Core\Web::url('site.home') ?>"
        target="<?= App\Core\Web::inGroup('site.events.promo') ? '_blank' : '_self' ?>">
            <img src="<?= ($global['logos'])->get('header')->url('small') ?>" />
        </a>

        <?php
        if (App\Core\Web::inGroup('site.events.promo') == false) { ?>
            <button class="navbar-toggler" type="button">
                <span class="navbar-toggler-icon"></span>
            </button>

            <ul class="navbar-nav ml-auto d-xl-flex align-items-center">
                <li class="nav-item">
                    <a class="nav-link <?= App\Core\Web::is('site.story') ? 'active' : '' ?>" href="<?= App\Core\Web::url('site.story') ?>">
                        POVESTEA MEA
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?= App\Core\Web::inGroup('site.blog') ? 'active' : '' ?>" href="<?= App\Core\Web::url('site.blog.all') ?>">
                        BLOG
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?= App\Core\Web::inGroup('site.coaching') ? 'active' : '' ?>" href="<?= App\Core\Web::url('site.coaching.info') ?>">
                        COACHING
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?= App\Core\Web::is('site.nlp') ? 'active' : '' ?>" href="<?= App\Core\Web::url('site.nlp') ?>">
                        NLP
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?= App\Core\Web::is('site.media') ? 'active' : '' ?>" href="<?= App\Core\Web::url('site.media') ?>">
                        MEDIA
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?= App\Core\Web::is('site.contact') ? 'active' : '' ?>" href="<?= App\Core\Web::url('site.contact') ?>">
                        CONTACT
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link btn <?= App\Core\Web::is('site.appoint') ? 'active' : '' ?>" href="<?= App\Core\Web::url('site.appoint') ?>">
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
            <div class="row padding-3rd-3rd padding-md-2nd-2nd text-center">
                <div class="col-lg text-lg-left">
                    <a href="<?= App\Core\Web::url('site.legal.terms') ?>" class="nowrap d-block d-sm-inline-block mr-sm-5">
                        Termeni și condiții
                    </a>
                    <a href="<?= App\Core\Web::url('site.legal.privacy') ?>" class="nowrap d-block d-sm-inline-block mr-sm-5">
                        Politica de confidențialitate
                    </a>
                    <a href="<?= App\Core\Web::url('site.legal.cookies') ?>" class="nowrap d-block d-sm-inline-block mr-sm-5">
                        Politica de cookies
                    </a>
                </div>
                <div class="col-lg-auto text-lg-right mt-2 mt-lg-0">
                    Copyright Melena @ Designed by
                    <a href="https://iscreambrands.ro/" target="_blank" title="iscreambrands" rel="nofollow">iscreambrands.ro</a>
                </div>
            </div>
        </div>
    </footer>

    [@js-footer@]
</body>
</html>
