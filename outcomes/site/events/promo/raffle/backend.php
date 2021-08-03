<?php

use App\Core\Meta;
use App\Core\Web;
use App\Validations\SiteValidation;
use App\Tables\Event\Promo\Raffle\Join;
use App\Tables\Event\Promo\Raffle;
use App\Tables\Event\Meeting;
use App\Views\Site;

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

$raffle = Raffle::first(
    array(
        'columns'   => "winner, title:lg, text:lg",
        'where'     => "id_meeting = ? AND slug:lg LIKE ?",
        'files'     => true
    ),
    array($meeting->id(), Web::param('raffle'))
);

if (!$raffle) {
    Web::go('site.home'); // TODO: change with this webinar, when they will exist
    exit;
}

if (Web::param('meeting') != $meeting->translation('slug') || Web::param('raffle') != $raffle->translation('slug')) {
    Web::go('site.events.promo.raffle', [
        'meeting'   => $meeting->translation('slug'),
        'raffle'    => $raffle->translation('slug')
    ]);
    exit;
}

$winner = Join::first(
    array(
        'columns'   => "name, phone, email",
        'where'     => "id_join = ?"
    ),
    array($raffle->winner)
);

$form = SiteValidation::session('site.ajax.events.promo.raffle.join');

Meta::set('title',			$raffle->translation('seo_title') ?: $raffle->translation('title'));
Meta::set('description',    $raffle->translation('seo_description'));
Meta::set('keywords',		$raffle->translation('seo_keywords'));

Meta::set('og:title',               $raffle->translation('seo_title'));
Meta::set('og:description',         $raffle->translation('seo_description'));
Meta::set('og:image',               $raffle->file('seo_image')->url('big'));
Meta::set('twitter:title',          $raffle->translation('seo_title'));
Meta::set('twitter:description',    $raffle->translation('seo_description'));
Meta::set('twitter:image',          $raffle->file('seo_image')->url('big'));
