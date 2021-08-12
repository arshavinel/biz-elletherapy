<?php

use Arsh\Core\Meta;
use Arsh\Core\Web;
use Brain\Validation\SiteValidation;
use Brain\Table\Event\Promo\Discount;
use Brain\Table\Event\Meeting;
use Brain\View\Site;

$meeting = Meeting::first(
    array(
        'columns'   => "title:lg",
        'where'     => "slug:lg LIKE ?"
    ),
    array(Web::param('meeting'))
);

if (!$meeting) {
    Web::go('site.home'); // TODO: change with webinars, when they will exist
    exit;
}

$discount = Discount::first(
    array(
        'columns'   => "title:lg, text:lg",
        'where'     => "id_meeting = ? AND slug:lg LIKE ?",
        'files'     => true
    ),
    array($meeting->id(), Web::param('discount'))
);

if (!$discount) {
    Web::go('site.home'); // TODO: change with this webinar, when they will exist
    exit;
}

if (Web::param('meeting') != $meeting->translation('slug') || Web::param('discount') != $discount->translation('slug')) {
    Web::go('site.events.promo.discount', [
        'meeting'   => $meeting->translation('slug'),
        'discount'  => $discount->translation('slug')
    ]);
    exit;
}

$form = SiteValidation::session('site.ajax.events.promo.discount.join');

Meta::set('title',			$discount->translation('seo_title') ?: $discount->translation('title'));
Meta::set('description',    $discount->translation('seo_description'));
Meta::set('keywords',		$discount->translation('seo_keywords'));

Meta::set('og:title',               $discount->translation('seo_title'));
Meta::set('og:description',         $discount->translation('seo_description'));
Meta::set('og:image',               $discount->file('seo_image')->url('big'));
Meta::set('twitter:title',          $discount->translation('seo_title'));
Meta::set('twitter:description',    $discount->translation('seo_description'));
Meta::set('twitter:image',          $discount->file('seo_image')->url('big'));
