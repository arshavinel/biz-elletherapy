<?php

use Arsh\Core\Web;

$links = call_user_func(function () use ($piece): array {
    $piece['icons'] = array(
        'first' => '<i class="fas fa-'. $piece['icons']['first'] . '"></i>',
        'left'  => '<i class="fas fa-'. $piece['icons']['left'] . '"></i>',
        'right' => '<i class="fas fa-'. $piece['icons']['right'] . '"></i>',
        'last'  => '<i class="fas fa-'. $piece['icons']['last'] . '"></i>'
    );

    $page = Web::page();
    $nr_of_pages = ceil($piece['count'] / $piece['visible']); // round up

    $links = array();

    if ($piece['count'] > $piece['visible']) {
        $range = function (int $nr_of_links) use ($page, $nr_of_pages) {
            $nr_of_links = min($nr_of_links, $nr_of_pages);

            $a = 1;
            $z = $nr_of_links;
            $ceil   = ceil($nr_of_links / 2);  // round up
            $floor  = floor($nr_of_links / 2); // round down

            if ($page > $ceil) {
                $a = $page - $floor;
                $z = $page + $floor - 1;
            }
            if ($page > ($nr_of_pages - $ceil)) {
                $a = max(1, $nr_of_pages - $nr_of_links);
                $z = $nr_of_pages;
            }

            return array($a, $z);
        };

        $ranges = array();
        foreach ($piece['buttons'] as $resolution => $max) {
            $r = $range($max);
            foreach (range($r[0], $r[1]) as $v) {
                $ranges[$v][] = $resolution;
            }
        }
        ksort($ranges);

        if ($page > 6) {
            $links[] = array(
                'url'       => Web::url(Web::key(), Web::params(), Web::language(), 1, $_GET),
                'title'     => $piece['icons']['first'],
                'active'    => false
            );
        }
        if ($page > 1) {
            $links[] = array(
                'url'       => Web::url(Web::key(), Web::params(), Web::language(), $page - 1, $_GET),
                'title'     => $piece['icons']['left'],
                'active'    => false
            );
        }

        foreach ($ranges as $p => $resolutions) {
            $links[] = array(
                'url'       => Web::url(Web::key(), Web::params(), Web::language(), $p, $_GET),
                'title'     => $p,
                'active'    => ($page == $p),
                'class'     => str_replace('-xs', '', 'd-none d-'. implode('-block d-', $resolutions) .'-block')
            );
        }

        if ($page < $nr_of_pages) {
            $links[] = array(
                'url'       => Web::url(Web::key(), Web::params(), Web::language(), $page + 1, $_GET),
                'title'     => $piece['icons']['right'],
                'active'    => false
            );
        }
        if ($page < ($nr_of_pages - 6)) {
            $links[] = array(
                'url'       => Web::url(Web::key(), Web::params(), Web::language(), $nr_of_pages, $_GET),
                'title'     => $piece['icons']['last'],
                'active'    => false
            );
        }
    }

    return $links;
});
