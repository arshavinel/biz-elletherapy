<?php

namespace App\Core;

use App\Core\Module\HTML\Piece;
use App\Core\Module\Backend;
use App\Core\ENV;
use App\Core\Web;
use App\Core\DB;

final class Module {

    /**
     * @param $back [array]
     * @param $request [array]
     *
     * @return [array|string]
    */
    static function backend (array $back, array $query, array $files = array()) {
        if (ENV::board('dev') && ENV::supervisor()) {
            foreach ($back as $key => $value) {
                $back[$key] = ("App\Core\Module\Syntax\Backend")::{$key}($value);
            }

            Backend::buildDB($back['DB'], $back['features'], $back['fields']);
        }

        DB::connect($back['DB']['conn']);

        if (!empty($query['ctn']) && isset($back['actions'][$query['ctn']])
        && method_exists("App\Core\Module\Request\Backend\Action\\". ucfirst($query['ctn']), Web::request())) {
            $callable = array("App\Core\Module\Request\Backend\Action\\". ucfirst($query['ctn']), Web::request());
        }
        else if (!empty($query['ftr']) && isset($back['features'][$query['ftr']])
        && ((!empty($query['id']) && is_numeric($query['id']) && is_int($query['id'] + 0)) || (!empty($query['ids']) && is_array($query['ids'])))
        && method_exists("App\Core\Module\Request\Backend\Feature\\". ucfirst($query['ftr']), Web::request())) {
            $callable = array("App\Core\Module\Request\Backend\Feature\\". ucfirst($query['ftr']), Web::request());
        }
        else if (Web::request() == 'GET') {
            $callable = array("App\Core\Module\Request\Backend\Action\Select", 'GET');
        }
        else {
            http_response_code(404);
            exit;
        }

        return call_user_func($callable, $back, $query, $files);
    }

    static function frontend (array $module, array $front): string {
        if (ENV::board('dev') && ENV::supervisor()) {
            foreach ($front as $key => $value) {
                $front[$key] = ("App\Core\Module\Syntax\Frontend")::{$key}($value);
            }
        }

        if (!empty($module['query']['ctn'])
        && method_exists("App\Core\Module\Request\Frontend\Action\\". ucfirst($module['query']['ctn']), Web::request())) {
            $callable = array("App\Core\Module\Request\Frontend\Action\\". ucfirst($module['query']['ctn']), Web::request());
        }
        else if (!empty($module['query']['ftr']) && !empty($module['query']['id']) && is_numeric($module['query']['id']) && is_int($module['query']['id'] + 0)
        && method_exists("App\Core\Module\Request\Frontend\Feature\\". ucfirst($module['query']['ftr']), Web::request())) {
            $callable = array("App\Core\Module\Request\Frontend\Feature\\". ucfirst($module['query']['ftr']), Web::request());
        }
        else if (Web::request() == 'GET') {
            $callable = array("App\Core\Module\Request\Frontend\Action\Select", 'GET');
        }

        ob_start(); ?>

            <div class="arshmodule">
                <?= call_user_func($callable, $module, $front) ?>

                <?= Piece::dialog() ?>
            </div>

        <?php
        return ob_get_clean();
    }
}
