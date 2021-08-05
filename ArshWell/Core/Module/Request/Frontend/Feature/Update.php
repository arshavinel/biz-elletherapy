<?php

namespace App\Core\Module\Request\Frontend\Feature;

use App\Core\Module\HTML\Piece;
use App\Core\URL;

final class Update {

    static function GET (array $module, array $front): string {
        foreach ($front['fields'] as $key => $field) {
            if (isset($module['response']['options'][$key])) {
                $front['fields'][$key]['HTML']['values'] = $module['response']['options'][$key];
            }
        }

        ob_start(); ?>

            <div class="row">
                <?= Piece::actions($front['breadcrumbs'] ?? array(), $front['actions'] ?? array()) ?>
            </div>

            <?php
            if ($module['response']['data']) { ?>
                <form class="arshmodule-form arshmodule-request-feature-update" action="<?= URL::get(true, false) ?>" method="POST">
                    <input type="hidden" name="ftr" value="update" />
                    <input type="hidden" name="id" value="<?= $module['query']['id'] ?>" />

                    <div class="row">
                        <div class="col-lg-8">
                            <div class="card mb-3">
                                <h6 class="card-header">
                                    Editare
                                    <?php
                                    if (($module['back']['DB']['table'])::isTranslated()) { ?>
                                        <div style="position: absolute; right: 15px; top: 0;">
                                            <?= Piece::languages(
                                                (($module['back']['DB']['table'])::TRANSLATOR)::LANGUAGES,
                                                (($module['back']['DB']['table'])::TRANSLATOR)::LANGUAGES[0],
                                                false
                                            ) ?>
                                        </div>
                                    <?php } ?>
                                </h6>
                            	<div class="card-body pt-2 pb-0">
                                    <?= Piece::fields(
                                        $module['back']['DB']['table'],
                                        $front['fields'],
                                        $module['response']['data'],
                                        call_user_func(function () use ($module) {
                                            $files = array();
                                            $translated = array();

                                            if (defined("{$module['back']['DB']['table']}::FILES")) {
                                                $files = array_keys(array_intersect_key(
                                                    ($module['back']['DB']['table'])::FILES,
                                                    array_filter($module['back']['fields'], function ($field) {
                                                        return empty($field['DB']['column']);
                                                    })
                                                ));
                                            }
                                            if (defined("{$module['back']['DB']['table']}::TRANSLATED")) {
                                                $translated = array_intersect(
                                                    ($module['back']['DB']['table'])::TRANSLATED,
                                                    array_column(array_column($module['back']['fields'], 'DB'), 'column')
                                                );
                                            }

                                            return array_merge($files, $translated);
                                        })
                                    ) ?>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <?= Piece::saver(
                                    array_keys(array_filter(
                                        array_merge($module['back']['actions'], $module['back']['features']),
                                        function ($array) use ($module) {
                                            return (
                                                (is_bool($array) && $array == true) ||
                                                !isset($array['response']['access']) ||
                                                (is_bool($array['response']['access']) && $array['response']['access'] == true) ||
                                                (is_callable($array['response']['access']) && call_user_func_array($array['response']['access'], (new \ReflectionFunction($array['response']['access']))->getParameters() ? array($module['query']['id']) : array()) == true)
                                            );
                                        }
                                    ))
                                ) ?>
                        </div>
                    </div>
                </form>
            <?php }
            else { ?>
                <form class="arshmodule-form">
                    <div class="card mb-3">
                        <h6 class="card-header">
                            Nu am găsit înregistrarea
                        </h6>
                        <div class="card-body py-2">
                            Cel mai probabil această înregistrare a fost ștearsă
                        </div>
                    </div>
                </form>
            <?php }

        return ob_get_clean();
    }
}
