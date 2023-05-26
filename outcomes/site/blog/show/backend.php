<?php

use Arshwell\Monolith\Meta;
use Arshwell\Monolith\Text;
use Arshwell\Monolith\Web;

use Arshavinel\ElleTherapy\Table\Article;

$article = Article::first(
    array(
        'columns'   => 'articles.title:lg, articles.description:lg, articles.id_category, article_categories.title:lg AS category, articles.seo_title:lg, articles.seo_description:lg, articles.seo_keywords:lg',
        'join'      => array(
            'INNER',
            'article_categories',
            'articles.id_category = article_categories.id_article_category'
        ),
        'where'     => "articles.id_article = ?",
        'files'     => true
    ),
    array(Web::param('id'))
);

if (!$article) {
    Web::go('site.blog.all');
    exit;
}

if (Web::param('slug') != Text::slug($article->translation('title'))) {
    Web::go('site.blog.show', [
        'id'    => $article->id(),
        'slug'  => $article->translation('title')
    ]);
    exit;
}

$related_articles = Article::select(
    array(
        'columns'   => "articles.title:lg, article_categories.title:lg AS category",
        'join'      => array(
            'INNER',
            'article_categories',
            "articles.id_category = article_categories.id_article_category"
        ),
        'where'     => "visible = 1 AND id_article != ?",
        'limit'     => 3,
        'order'     => "CASE WHEN articles.id_category = ? THEN 1 END DESC, articles.id_article DESC",
        'files'     => true
    ),
    array($article->id(), $article->id_category)
);

Meta::set('title',			$article->translation('seo_title') ?: $article->translation('title'));
Meta::set('description',    $article->translation('seo_description'));
Meta::set('keywords',		$article->translation('seo_keywords'));

Meta::set('og:type',                "article");
Meta::set('og:title',               $article->translation('seo_title'));
Meta::set('og:description',         $article->translation('seo_description'));
Meta::set('og:image',               $article->file('preview')->url('big'));
Meta::set('twitter:title',          $article->translation('seo_title'));
Meta::set('twitter:description',    $article->translation('seo_description'));
Meta::set('twitter:image',          $article->file('preview')->url('big'));
