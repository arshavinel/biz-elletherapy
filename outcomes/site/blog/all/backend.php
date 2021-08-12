<?php

use Arsh\Core\Meta;
use Arsh\Core\Web;
use Brain\Table\Article;
use Brain\View\Site;

$count = Article::count("visible = 1");
$limit = 6;

$articles = Article::select(array(
    'columns'   => "articles.title:lg, article_categories.title:lg AS category",
    'join'      => array(
        'INNER',
        'article_categories',
        "articles.id_category = article_categories.id_article_category"
    ),
    'where'     => "visible = 1",
    'limit'     => $limit,
    'offset'    => (Web::page() > 1 ? $limit * (Web::page() - 1) : 0),
    'order'     => "id_article DESC",
    'files'     => true
));

if (!$articles && Web::page() > 1) {
    Web::go(Web::key(), Web::params(), Web::page() - 1, $_GET);
    exit;
}

Meta::set('title',			Site::sentenceSEO('title'));
Meta::set('description',	Site::textSEO('description'));
Meta::set('keywords',		Site::sentenceSEO('keywords'));

Meta::set('og:title',               Site::sentenceSEO('SM:title'));
Meta::set('og:description',         Site::textSEO('SM:description'));
Meta::set('og:image',               Site::imageSEO('SM:image', 1200, 627));
Meta::set('twitter:title',          Site::sentenceSEO('SM:title'));
Meta::set('twitter:description',    Site::textSEO('SM:description'));
Meta::set('twitter:image',          Site::imageSEO('SM:image', 1200, 627));

Meta::set('pages',          ceil($count / $limit));
