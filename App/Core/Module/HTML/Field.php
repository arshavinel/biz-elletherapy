<?php

namespace App\Core\Module\HTML;

use App\Core\Table\Files\ImageGroup;
use App\Core\Table\Files\Image;
use App\Core\Table\Files\Doc;
use App\Core\File;
use App\Core\Func;
use App\Core\Math;
use App\Core\Web;
use App\Core\ENV;
use App\Core\URL;

final class Field {

    static function image (array $config, string $language = NULL): string {
        $image = $config['HTML']['value'];

        if ($language) {
            if (!empty($config['HTML']['id'])) {
                $config['HTML']['id'] .= "-$language";
            }
            if (!empty($config['HTML']['name'])) {
                $config['HTML']['name'] .= "[$language]";
            }
        }

        $piece = array(
            'selector'  => array(
                'identifier'    => str_replace(['][', '[', ']'], '.', preg_replace("/(\[)?\]/", '', $config['HTML']['name']))
            ),
            'filetools' => array(
                'name'          => str_replace(']]', ']', preg_replace("/([^\]])\[/", '$1][', '['. $config['HTML']['name'] .']')),
                'identifier'    => str_replace(['][', '[', ']'], '.', preg_replace("/(\[)?\]/", '', $config['HTML']['name']))
            )
        );

        ob_start(); ?>

            <div class="arshmodule-html arshmodule-html-field arshmodule-html-field-image">
                <div class="row">
                    <?php
                    if ($image && $image->urls()) { // because, inserting new first image, doesn't need this box
                        $basename = basename($image->smallest($language)); ?>

                        <div class="col-12 col-sm-6">
                            <div class="box">
                                <img src="<?= $image->smallest($language) ?>" />

                                <div class="image"
                                data-language="<?= ($language ?: (($image->class())::TRANSLATOR)::get()) ?>"
                                data-folder="<?= $image->folder() ?>"
                                data-uploads="<?= Web::site() ?>uploads/"
                                data-smallest-size="<?= File::parsePath(ltrim(preg_replace('~^'. ENV::root() .'~', '', URL::path($image->smallest($language))), '/'), 'size') ?>">
                                    <div class="image-actions px-2">
                                        <input type="hidden" name="filetools[delete]<?= $piece['filetools']['name'] ?>" value="1" disabled />
                                        <span class="info info-red text-light" form-error="filetools.delete.<?= $piece['filetools']['identifier'] ?>"></span>

                                        <button type="button" class="action-delete mb-1 mr-1 btn btn-light btn-sm" data-toggle="tooltip" data-placement="top" title="Șterge imaginea">
                                            <i class="fa fa-fw fa-trash-alt"></i>
                                        </button>
                                        <button type="button" href="<?= $image->biggest($language) ?>"
                                        data-caption="<?= $basename ?>" data-fancybox="<?= $piece['selector']['identifier'] ?>"
                                        data-thumb="<?= $image->smallest($language) ?>"
                                        data-protect="true" class="action-zoom mb-1 mr-1 btn btn-light btn-sm"
                                        data-toggle="tooltip" data-placement="top" title="Zoom">
                                            <i class="fa fa-fw fa-search-plus"></i>
                                        </button>
                                        <button type="button" class="action-rename mb-1 mr-1 btn btn-light btn-sm" data-toggle="tooltip" data-placement="top" title="Editează numele">
                                            <i class="fa fa-fw fa-edit" data-toggle="fa-edit fa-file-signature"></i>
                                        </button>
                                        <div class="btn-group dropright align-top" data-toggle="tooltip" data-placement="top" title="Descarcă">
                                            <button type="button" class="dropdown-toggle btn btn-light btn-sm" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <i class="fa fa-fw fa-download"></i>
                                            </button>
                                            <div class="dropdown-menu p-1">
                                                <?php
                                                foreach ($image->sizes() as $size => $values) { ?>
                                                    <a class="dropdown-item p-1" data-size="<?= $size ?>" href="<?= $image->url($size, $language) ?>" target="_blank">
                                                        <small><?= implode('x', array_map(function (array $side) {
                                                            if ($side[0] == $side[1]) {
                                                                if ($side[0] == NULL) {
                                                                    return "(auto)";
                                                                }
                                                                return $side[0];
                                                            }
                                                            else if ($side[0] == NULL) {
                                                                return "<span class='text-monospace'>(&#8804;$side[1])</span>";
                                                            }
                                                            else if ($side[1] == NULL) {
                                                                return "<span class='text-monospace'>(&#8805;$side[0])</span>";
                                                            }
                                                            else {
                                                                sort($side);

                                                                return "<span class='text-monospace'>($side[0]-$side[1])</span>";
                                                            }
                                                        }, $values)) ?></small>
                                                    </a>
                                                <?php } ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="image-name bg-light text-secondary">
                                        <small title="<?= $basename ?>">
                                            <?= $basename ?>
                                        </small>
                                        <div class="input-group d-none">
                                            <input type="text" class="form-control" name="filetools[rename]<?= $piece['filetools']['name'] ?>" value="<?= File::name($basename) ?>" disabled />
                                            <div class="input-group-append">
                                                <span class="input-group-text px-1">.<?= File::extension($basename) ?></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                    <div class="col-12 col-sm-6">
                        <div class="box image-uploaded d-none">
                            <img />
                            <div class="image">
                                <div class="image-actions px-2">
                                    <button type="button" class="action-crop mb-1 mr-1 btn btn-light btn-sm" data-toggle="tooltip" data-placement="top" title="Crop">
                                        <i class="fa fa-fw fa-crop"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="input-group" <?= ($language ? 'language="'.$language.'"' : '') ?>>
                    <div class="input-group-prepend">
                        <button class="btn btn-sm custom-file-trash" type="button">
                            <i class="fa fa-fw fa-trash-alt fa-fw"></i>
                        </button>
                    </div>
                    <div class="custom-file">
                        <input type="file" class="custom-file-input" accept="image/*"
                        <?= (($config['HTML']['name'] ?? false) ? 'name="'.$config['HTML']['name'].'"' : '') ?>
                        <?= (($config['HTML']['id'] ?? false) ? 'id="'.$config['HTML']['id'].'"' : '') ?> />
                        <label class="custom-file-label"
                        <?= (($config['HTML']['id'] ?? false) ? 'for="'.$config['HTML']['id'].'"' : '') ?>>
                            Alege fișier
                        </label>
                    </div>
                </div>
                <?php
                if ($image && $image->sizes()) {
                    array_unshift(
                        $config['HTML']['notes'],
                        call_user_func(function () use ($image) {
                            ob_start(); ?>
                                *Cea mai mică dimensiune potrivită:
                                <u data-toggle="tooltip" data-placement="left" data-html="true"
                                title="<span style='font-size: smaller'>Rezoluțiile finale:<br><?= implode(', ', array_map(function (array $size) {
                                    return (
                                        implode('x', array_map(function (array $side) {
                                            if ($side[0] == $side[1]) {
                                                if ($side[0] == NULL) {
                                                    return "(auto)";
                                                }
                                                return $side[0];
                                            }
                                            else if ($side[0] == NULL) {
                                                return "<small class='text-monospace'>(&#8804;$side[1])</small>";
                                            }
                                            else if ($side[1] == NULL) {
                                                return "<small class='text-monospace'>(&#8805;$side[0])</small>";
                                            }
                                            else {
                                                sort($side);

                                                return "<small class='text-monospace'>($side[0]-$side[1])</small>";
                                            }
                                        }, $size)) .
                                        ($size['width'][0] != $size['width'][1] || $size['height'][0] != $size['height'][1] ? '<br>' : '')
                                    );
                                }, $image->sizes())) ?></u></span>">
                                    <?= File::minProperlyRatio($image->sizes()) ?>
                                </u>
                            <?php
                            return ob_get_clean();
                        })
                    );
                }
                foreach (($config['HTML']['notes'] ?? array()) as $note) { ?>
                    <span class="note ml-2">
                        <?= $note ?>
                    </span>
                <?php }
                if (!empty($config['HTML']['name'])) { ?>
                    <small class="text-danger" form-error="<?= $piece['selector']['identifier'] ?>"></small>
                <?php } ?>
            </div>

        <?php
        return ob_get_clean();
    }

    static function images (array $config, string $language = NULL): string {
        $images = $config['HTML']['value'];

        if ($language) {
            if (!empty($config['HTML']['id'])) {
                $config['HTML']['id'] .= "-$language";
            }
            if (!empty($config['HTML']['name'])) {
                $config['HTML']['name'] .= "[$language]";
            }
        }

        $piece = array(
            'selector'  => array(
                'identifier'    => str_replace(['][', '[', ']'], '.', preg_replace("/(\[)?\]/", '', $config['HTML']['name']))
            ),
            'filetools' => array(
                'name'          => str_replace(']]', ']', preg_replace("/([^\]])\[/", '$1][', '['. $config['HTML']['name'] .']')),
                'identifier'    => str_replace(['][', '[', ']'], '.', preg_replace("/(\[)?\]/", '', $config['HTML']['name']))
            )
        );

        ob_start(); ?>

            <div class="arshmodule-html arshmodule-html-field arshmodule-html-field-images">
                <div class="row">
                    <?php
                    if ($images && $images->urls()) { // because, inserting new row, doesn't need this box
                        $smallest   = $images->smallest($language);
                        $biggest    = $images->biggest($language);
                        $count      = count($smallest);

                        for ($i = 0; $i < $count; $i++) {
                            $basename = basename($smallest[$i]); ?>

                            <div class="col-12 col-sm-6 col-lg-4">
                                <div class="box">
                                    <img src="<?= $smallest[$i] ?>" />
                                    <div class="image"
                                    data-language="<?= ($language ?: (($images->class())::TRANSLATOR)::get()) ?>"
                                    data-folder="<?= $images->folder() ?>"
                                    data-uploads="<?= Web::site() ?>uploads/"
                                    data-smallest-size="<?= File::parsePath(ltrim(preg_replace('~^'. ENV::root() .'~', '', URL::path($images->smallest($language)[0])), '/'), 'size') ?>">
                                        <div class="image-actions px-2">
                                            <input type="hidden" name="filetools[delete]<?= $piece['filetools']['name'] ?>[<?= $basename ?>]" value="1" disabled />
                                            <span class="info info-red text-light" form-error="filetools.delete.<?= $piece['filetools']['identifier'] ?>.<?= $basename ?>"></span>

                                            <button type="button" class="action-delete mb-1 mr-1 btn btn-light btn-sm" data-toggle="tooltip" data-placement="top" title="Șterge imaginea">
                                                <i class="fa fa-fw fa-trash-alt"></i>
                                            </button>
                                            <button type="button" data-caption="<?= $basename ?>" href="<?= $biggest[$i] ?>" data-thumb="<?= $smallest[$i] ?>" data-protect="true" data-fancybox="<?= $piece['selector']['identifier'] ?>" class="action-zoom mb-1 mr-1 btn btn-light btn-sm" data-toggle="tooltip" data-placement="top" title="Zoom">
                                                <i class="fa fa-fw fa-search-plus"></i>
                                            </button>
                                            <button type="button" class="action-rename mb-1 mr-1 btn btn-light btn-sm" data-toggle="tooltip" data-placement="top" title="Editează numele">
                                                <i class="fa fa-fw fa-edit" data-toggle="fa-edit fa-file-signature"></i>
                                            </button>
                                            <div class="btn-group dropright align-top" data-toggle="tooltip" data-placement="top" title="Descarcă">
                                                <button type="button" class="dropdown-toggle btn btn-light btn-sm" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <i class="fa fa-fw fa-download"></i>
                                                </button>
                                                <div class="dropdown-menu p-1">
                                                    <?php
                                                    foreach ($images->sizes() as $size => $ranges) { ?>
                                                        <a class="dropdown-item p-1" data-size="<?= $size ?>" href="<?= $images->url($size, $language)[$i] ?>" target="_blank">
                                                            <small><?= implode('x', array_map(function (array $side) {
                                                                if ($side[0] == $side[1]) {
                                                                    if ($side[0] == NULL) {
                                                                        return "(auto)";
                                                                    }
                                                                    return $side[0];
                                                                }
                                                                else if ($side[0] == NULL) {
                                                                    return "<span class='text-monospace'>(&#8804;$side[1])</span>";
                                                                }
                                                                else if ($side[1] == NULL) {
                                                                    return "<span class='text-monospace'>(&#8805;$side[0])</span>";
                                                                }
                                                                else {
                                                                    sort($side);

                                                                    return "<span class='text-monospace'>($side[0]-$side[1])</span>";
                                                                }
                                                            }, $ranges)) ?></small>
                                                        </a>
                                                    <?php } ?>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="image-name bg-light text-secondary">
                                            <small title="<?= $basename ?>">
                                                <?= $basename ?>
                                            </small>
                                            <div class="input-group d-none">
                                                <input type="text" class="form-control" name="filetools[rename]<?= $piece['filetools']['name'] ?>[<?= $basename ?>]" value="<?= File::name($basename) ?>" disabled />
                                                <div class="input-group-append">
                                                    <span class="input-group-text px-1">.<?= File::extension($basename) ?></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php }
                    } ?>
                    <div class="col-12 col-sm-6 col-lg-4 col-xl-3 image-uploaded d-none">
                        <div class="box">
                            <img />
                            <div class="image">
                                <div class="image-actions px-2">
                                    <input type="hidden" name="filetools[delete]<?= $piece['filetools']['name'] ?>" value="1" disabled />
                                    <span class="info info-red text-light" form-error="filetools.delete.<?= $piece['filetools']['identifier'] ?>"></span>

                                    <button type="button" class="action-crop mb-1 mr-1 btn btn-light btn-sm" data-toggle="tooltip" data-placement="top" title="Crop">
                                        <i class="fa fa-fw fa-crop"></i>
                                    </button>
                                    <button type="button" class="d-none action-delete mb-1 mr-1 btn btn-light btn-sm" data-toggle="tooltip" data-placement="top" title="Șterge imaginea">
                                        <i class="fa fa-fw fa-trash-alt" data-toggle="fa-trash-alt fa-trash-restore-alt"></i>
                                    </button>
                                    <button type="button" href data-fancybox class="d-none action-zoom mb-1 mr-1 btn btn-light btn-sm" data-toggle="tooltip" data-placement="top" title="Zoom">
                                        <i class="fa fa-fw fa-search-plus"></i>
                                    </button>
                                    <button type="button" class="d-none action-rename mb-1 mr-1 btn btn-light btn-sm" data-toggle="tooltip" data-placement="top" title="Editează numele">
                                        <i class="fa fa-fw fa-edit" data-toggle="fa-edit fa-file-signature"></i>
                                    </button>
                                    <div class="d-none btn-group dropright align-top" data-toggle="tooltip" data-placement="top" title="Descarcă">
                                        <button type="button" class="dropdown-toggle btn btn-light btn-sm" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="fa fa-fw fa-download"></i>
                                        </button>
                                        <div class="dropdown-menu p-1">
                                            <?php
                                            if ($images) {
                                                foreach ($images->sizes() as $size => $ranges) { ?>
                                                    <a class="dropdown-item p-1" data-size="<?= $size ?>" href="" target="_blank">
                                                        <small><?= implode('x', array_map(function (array $side) {
                                                            if ($side[0] == $side[1]) {
                                                                if ($side[0] == NULL) {
                                                                    return "(auto)";
                                                                }
                                                                return $side[0];
                                                            }
                                                            else if ($side[0] == NULL) {
                                                                return "<span class='text-monospace'>(&#8804;$side[1])</span>";
                                                            }
                                                            else if ($side[1] == NULL) {
                                                                return "<span class='text-monospace'>(&#8805;$side[0])</span>";
                                                            }
                                                            else {
                                                                sort($side);

                                                                return "<span class='text-monospace'>($side[0]-$side[1])</span>";
                                                            }
                                                        }, $ranges)) ?></small>
                                                    </a>
                                                <?php }
                                            }
                                            else { ?>
                                                <a class="dropdown-item p-1" href target="_blank"></a>
                                            <?php } ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="image-name bg-light text-secondary d-none">
                                    <small title></small>
                                    <div class="input-group d-none">
                                        <input type="text" class="form-control" name="filetools[rename]<?= $piece['filetools']['name'] ?>" value="" disabled />
                                        <div class="input-group-append">
                                            <span class="input-group-text"></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="input-group" <?= ($language ? 'language="'.$language.'"' : '') ?>>
                    <div class="input-group-prepend">
                        <button class="btn btn-sm custom-file-trash" type="button">
                            <i class="fa fa-fw fa-trash-alt fa-fw"></i>
                        </button>
                    </div>
                    <div class="custom-file">
                        <input type="file" class="custom-file-input" multiple accept="image/*"
                        <?= (($config['HTML']['name'] ?? false) ? 'name="'.$config['HTML']['name'].'[]"' : '') ?>
                        <?= (($config['HTML']['id'] ?? false) ? 'id="'.$config['HTML']['id'].'"' : '') ?> />
                        <label class="custom-file-label"
                        <?= (($config['HTML']['id'] ?? false) ? 'for="'.$config['HTML']['id'].'"' : '') ?>>
                            Alege fișiere
                        </label>
                    </div>
                </div>
                <?php
                if ($images && $images->sizes()) {
                    array_unshift(
                        $config['HTML']['notes'],
                        call_user_func(function () use ($images) {
                            ob_start(); ?>
                                *Cea mai mică dimensiune potrivită:
                                <u data-toggle="tooltip" data-placement="left" data-html="true"
                                title="<span style='font-size: smaller'>Rezoluțiile finale:<br><?= implode(', ', array_map(function (array $ranges) {
                                    return (
                                        ($ranges['width'][0] != $ranges['width'][1] || $ranges['height'][0] != $ranges['height'][1] ? '<br>' : '') .
                                        implode('x', array_map(function (array $side) {
                                            if ($side[0] == $side[1]) {
                                                if ($side[0] == NULL) {
                                                    return "(auto)";
                                                }
                                                return $side[0];
                                            }
                                            else if ($side[0] == NULL) {
                                                return "<small class='text-monospace'>(&#8804;$side[1])</small>";
                                            }
                                            else if ($side[1] == NULL) {
                                                return "<small class='text-monospace'>(&#8805;$side[0])</small>";
                                            }
                                            else {
                                                sort($side);

                                                return "<small class='text-monospace'>($side[0]-$side[1])</small>";
                                            }
                                        }, $ranges))
                                    );
                                }, $images->sizes())) ?></u></span>">
                                    <?= File::minProperlyRatio($images->sizes()) ?>
                                </u>
                            <?php
                            return ob_get_clean();
                        }),
                        "*Imaginile vor fi afișate în ordine alfabetică"
                    );
                }
                foreach (($config['HTML']['notes'] ?? array()) as $note) { ?>
                    <span class="note ml-2">
                        <?= $note ?>
                    </span>
                <?php }
                if (!empty($config['HTML']['name'])) { ?>
                    <small class="text-danger" form-error="<?= $piece['selector']['identifier'] ?>"></small>
                <?php } ?>
            </div>

        <?php
        return ob_get_clean();
    }

    static function doc (array $config, string $language = NULL): string {
        $doc = $config['HTML']['value'];

        if ($language) {
            if (!empty($config['HTML']['id'])) {
                $config['HTML']['id'] .= "-$language";
            }
            if (!empty($config['HTML']['name'])) {
                $config['HTML']['name'] .= "[$language]";
            }
        }

        $piece = array(
            'selector'  => array(
                'identifier'    => str_replace(['][', '[', ']'], '.', preg_replace("/(\[)?\]/", '', $config['HTML']['name']))
            ),
            'filetools' => array(
                'name'          => str_replace(']]', ']', preg_replace("/([^\]])\[/", '$1][', '['. $config['HTML']['name'] .']')),
                'identifier'    => str_replace(['][', '[', ']'], '.', preg_replace("/(\[)?\]/", '', $config['HTML']['name']))
            )
        );

        ob_start(); ?>

            <div class="arshmodule-html arshmodule-html-field arshmodule-html-field-doc">
                <div class="row">
                    <?php
                    if ($doc && $doc->urls()) { // because, inserting new first doc, doesn't need this box
                        $basename = basename($doc->url($language)); ?>

                        <div class="col-12 col-sm-6">
                            <div class="box">
                                <div class="btn btn-info text-monospace" title="<?= $basename ?>">
                                    <?= strtoupper(File::extension($basename)) ?>
                                </div>

                                <div class="doc"
                                data-language="<?= ($language ?: (($doc->class())::TRANSLATOR)::get()) ?>"
                                data-folder="<?= $doc->folder() ?>"
                                data-uploads="<?= Web::site() ?>uploads/">
                                    <div class="doc-actions px-2">
                                        <input type="hidden" name="filetools[delete]<?= $piece['filetools']['name'] ?>" value="1" disabled />
                                        <span class="info info-red text-light" form-error="filetools.delete.<?= $piece['filetools']['identifier'] ?>"></span>

                                        <button type="button" class="action-delete mb-1 mr-1 btn btn-light btn-sm" data-toggle="tooltip" data-placement="top" title="Șterge fișierul">
                                            <i class="fa fa-fw fa-trash-alt" data-toggle="fa-trash-alt fa-trash-restore-alt"></i>
                                        </button>
                                        <a href="<?= $doc->url($language) ?>" target="_blank"
                                        class="action-zoom mb-1 mr-1 btn btn-light btn-sm"
                                        data-toggle="tooltip" data-placement="top" title="Vezi fișierul">
                                            <i class="fa fa-fw fa-download"></i>
                                        </a>
                                        <button type="button" class="action-rename mb-1 mr-1 btn btn-light btn-sm" data-toggle="tooltip" data-placement="top" title="Editează numele">
                                            <i class="fa fa-fw fa-edit" data-toggle="fa-edit fa-file-signature"></i>
                                        </button>
                                    </div>
                                    <div class="doc-name bg-light text-secondary">
                                        <small title="<?= $basename ?>">
                                            <?= $basename ?>
                                        </small>
                                        <div class="input-group d-none">
                                            <input type="text" class="form-control" name="filetools[rename]<?= $piece['filetools']['name'] ?>" value="<?= File::name($basename) ?>" disabled />
                                            <div class="input-group-append">
                                                <span class="input-group-text">.<?= File::extension($basename) ?></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                    <div class="col-12 col-sm-6">
                        <div class="box doc-uploaded d-none">
                            <div class="btn btn-info text-monospace" title></div>
                            <div class="doc">
                                <div class="doc-actions px-2">
                                    <!-- <button type="button" class="action-crop mb-1 mr-1 btn btn-light btn-sm" data-toggle="tooltip" data-placement="top" title="Crop">
                                        <i class="fa fa-fw fa-crop"></i>
                                    </button> -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="input-group"
                <?= ($language ? 'language="'.$language.'"' : '') ?>>
                    <div class="input-group-prepend">
                        <button class="btn btn-sm custom-file-trash" type="button">
                            <i class="fa fa-fw fa-trash-alt fa-fw"></i>
                        </button>
                    </div>
                    <div class="custom-file">
                        <input type="file" class="custom-file-input" accept="*"
                        <?= (($config['HTML']['name'] ?? false) ? 'name="'.$config['HTML']['name'].'"' : '') ?>
                        <?= (($config['HTML']['id'] ?? false) ? 'id="'.$config['HTML']['id'].'"' : '') ?> />
                        <label class="custom-file-label"
                        <?= (($config['HTML']['id'] ?? false) ? 'for="'.$config['HTML']['id'].'"' : '') ?>>
                            Alege fișier
                        </label>
                    </div>
                </div>
                <?php
                foreach (($config['HTML']['notes'] ?? array()) as $note) { ?>
                    <span class="note ml-2">
                        <?= $note ?>
                    </span>
                <?php }
                if (!empty($config['HTML']['name'])) { ?>
                    <small class="text-danger" form-error="<?= $piece['selector']['identifier'] ?>"></small>
                <?php } ?>
            </div>

        <?php
        return ob_get_clean();
    }

    static function video (array $config, string $language = NULL): string {
        $video = $config['HTML']['value'];

        if ($language) {
            if (!empty($config['HTML']['id'])) {
                $config['HTML']['id'] .= "-$language";
            }
            if (!empty($config['HTML']['name'])) {
                $config['HTML']['name'] .= "[$language]";
            }
        }

        $piece = array(
            'selector'  => array(
                'identifier'    => str_replace(['][', '[', ']'], '.', preg_replace("/(\[)?\]/", '', $config['HTML']['name']))
            ),
            'filetools' => array(
                'name'          => str_replace(']]', ']', preg_replace("/([^\]])\[/", '$1][', '['. $config['HTML']['name'] .']')),
                'identifier'    => str_replace(['][', '[', ']'], '.', preg_replace("/(\[)?\]/", '', $config['HTML']['name']))
            )
        );

        ob_start(); ?>

            <div class="arshmodule-html arshmodule-html-field arshmodule-html-field-video">
                <div class="row">
                    <?php
                    if ($video && $video->urls()) { // because, inserting new first video, doesn't need this box
                        $basename = basename($video->url($language)); ?>

                        <div class="col-12 col-sm-6">
                            <div class="box">
                                <video muted>
                                    <source src="<?= $video->url($language) ?>" />
                                    Browser-ul tău nu suportă HTML5 video.
                                </video>

                                <div class="video"
                                data-language="<?= ($language ?: (($video->class())::TRANSLATOR)::get()) ?>"
                                data-folder="<?= $video->folder() ?>"
                                data-uploads="<?= Web::site() ?>uploads/">
                                    <div class="video-actions px-2">
                                        <input type="hidden" name="filetools[delete]<?= $piece['filetools']['name'] ?>" value="1" disabled />
                                        <span class="info info-red text-light" form-error="filetools.delete.<?= $piece['filetools']['identifier'] ?>"></span>

                                        <button type="button" class="action-delete mb-1 mr-1 btn btn-light btn-sm" data-toggle="tooltip" data-placement="top" title="Șterge imaginea">
                                            <i class="fa fa-fw fa-trash-alt" data-toggle="fa-trash-alt fa-trash-restore-alt"></i>
                                        </button>
                                        <button type="button" class="action-play mb-1 mr-1 btn btn-light btn-sm" data-toggle="tooltip" data-placement="top" title="Play">
                                            <i class="fas fa-fw fa-play-circle" data-toggle="fa-play-circle fa-pause-circle"></i>
                                        </button>
                                        <button type="button" class="action-replay mb-1 mr-1 btn btn-light btn-sm" data-toggle="tooltip" data-placement="top" title="Replay">
                                            <i class="fas fa-fw fa-history"></i>
                                        </button>
                                        <button type="button" class="action-volume mb-1 mr-1 btn btn-light btn-sm" data-toggle="tooltip" data-placement="top" title="Sunet">
                                            <i class="fas fa-fw fa-volume-mute" data-toggle="fa-volume-mute fa-volume-up"></i>
                                        </button>
                                        <button type="button" class="action-rename mb-1 mr-1 btn btn-light btn-sm" data-toggle="tooltip" data-placement="top" title="Editează numele">
                                            <i class="fa fa-fw fa-edit" data-toggle="fa-edit fa-file-signature"></i>
                                        </button>
                                        <a href="<?= $video->url($language) ?>" target="_blank" class="mb-1 mr-1 btn btn-light btn-sm" data-toggle="tooltip" data-placement="top" title="Descarcă">
                                            <i class="fa fa-fw fa-download"></i>
                                        </a>
                                    </div>
                                    <div class="video-name bg-light text-secondary">
                                        <small title="<?= $basename ?>">
                                            <?= $basename ?>
                                        </small>
                                        <div class="input-group d-none">
                                            <input type="text" class="form-control" name="filetools[rename]<?= $piece['filetools']['name'] ?>" value="<?= File::name($basename) ?>" disabled />
                                            <div class="input-group-append">
                                                <span class="input-group-text px-1">.<?= File::extension($basename) ?></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                    <div class="col-12 col-sm-6">
                        <div class="box video-uploaded d-none">
                            <video muted>
                                <source />
                                Browser-ul tău nu suportă HTML5 video.
                            </video>
                            <div class="video">
                                <div class="video-actions px-2">
                                    <button type="button" class="action-play mb-1 mr-1 btn btn-light btn-sm" data-toggle="tooltip" data-placement="top" title="Play">
                                        <i class="fas fa-fw fa-play-circle" data-toggle="fa-play-circle fa-pause-circle"></i>
                                    </button>
                                    <button type="button" class="action-replay mb-1 mr-1 btn btn-light btn-sm" data-toggle="tooltip" data-placement="top" title="Replay">
                                        <i class="fas fa-fw fa-history"></i>
                                    </button>
                                    <button type="button" class="action-volume mb-1 mr-1 btn btn-light btn-sm" data-toggle="tooltip" data-placement="top" title="Sunet">
                                        <i class="fas fa-fw fa-volume-mute" data-toggle="fa-volume-mute fa-volume-up"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="mt-2">
                    <div class="input-group" <?= ($language ? 'language="'.$language.'"' : '') ?>>
                        <div class="input-group-prepend">
                            <button class="btn btn-sm custom-file-trash" type="button">
                                <i class="fa fa-fw fa-trash-alt fa-fw"></i>
                            </button>
                        </div>
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" accept="video/*"
                            <?= (($config['HTML']['name'] ?? false) ? 'name="'.$config['HTML']['name'].'"' : '') ?>
                            <?= (($config['HTML']['id'] ?? false) ? 'id="'.$config['HTML']['id'].'"' : '') ?> />
                            <label class="custom-file-label"
                            <?= (($config['HTML']['id'] ?? false) ? 'for="'.$config['HTML']['id'].'"' : '') ?>>
                                Alege fișier
                            </label>
                        </div>
                    </div>
                </div>
                <?php
                foreach (($config['HTML']['notes'] ?? array()) as $note) { ?>
                    <span class="note ml-2">
                        <?= $note ?>
                    </span>
                <?php }
                if (!empty($config['HTML']['name'])) { ?>
                    <small class="text-danger" form-error="<?= $piece['selector']['identifier'] ?>"></small>
                <?php } ?>
            </div>

        <?php
        return ob_get_clean();
    }

    static function text (array $config, string $language = NULL): string {
        if ($language) {
            if (!empty($config['HTML']['id'])) {
                $config['HTML']['id'] .= "-$language";
            }
            if (!empty($config['HTML']['name'])) {
                $config['HTML']['name'] .= "[$language]";
            }
        }

        ob_start(); ?>

            <div <?= ($language ? 'language="'.$language.'"' : '') ?>>
                <input
                type="text"
                class="form-control <?= $config['HTML']['class'] ?? '' ?>"
                placeholder="<?= $config['HTML']['placeholder'] ?? '' ?>"
                <?= (($config['HTML']['id'] ?? false) ? 'id="'.$config['HTML']['id'].'"' : '') ?>
                <?php
                if (isset($config['JS']['tagsinput'])) {
                    echo ('js-plugin-tagsinput="'.(!is_bool($config['JS']['tagsinput']) || $config['JS']['tagsinput'] == true ? 'true' : 'false').'"');

                    if (is_array($config['JS']['tagsinput'])) {
                        echo implode(' ', array_map(function ($key, $value) {
                            return ("js-plugin-tagsinput-".$key.'="'.$value.'"');
                        }, array_keys($config['JS']['tagsinput']), $config['JS']['tagsinput']));
                    }
                } ?>
                <?= (($config['HTML']['name'] ?? false) ? 'name="'.$config['HTML']['name'].'"' : '') ?>
                value="<?= $config['HTML']['value'] ?>"
                form-valid-update="<?= (empty($config['JS']['update']) ? 'false' : 'true') ?>"
                <?= (($config['HTML']['disabled'] ?? false) ? 'disabled="disabled"' : '') ?>
                <?= (($config['HTML']['readonly'] ?? false) ? 'readonly="readonly"' : '') ?>
                />
            </div>
            <?php
            foreach (($config['HTML']['notes'] ?? array()) as $note) { ?>
                <span class="note ml-2">
                    <?= $note ?>
                </span>
            <?php }
            if (!empty($config['HTML']['name'])) { ?>
                <small class="text-danger" form-error="<?= str_replace(['][', '[', ']'], '.', preg_replace("/(\[)?\]/", '', $config['HTML']['name'])) ?>"></small>
            <?php }

        return ob_get_clean();
    }

    static function textarea (array $config, string $language = NULL): string {
        if ($language) {
            if (!empty($config['HTML']['id'])) {
                $config['HTML']['id'] .= "-$language";
            }
            if (!empty($config['HTML']['name'])) {
                $config['HTML']['name'] .= "[$language]";
            }
        }

        ob_start(); ?>

            <div <?= ($language ? 'language="'.$language.'"' : '') ?>>
                <textarea
                class="form-control <?= $config['HTML']['class'] ?? '' ?>"
                placeholder="<?= $config['HTML']['placeholder'] ?? '' ?>"
                <?php
                if (isset($config['JS']['tinymce'])) {
                    echo ('js-plugin-tinymce="'.(!is_bool($config['JS']['tinymce']) || $config['JS']['tinymce'] == true ? 'true' : 'false').'"');

                    if (is_array($config['JS']['tinymce'])) {
                        echo implode(' ', array_map(function ($key, $value) {
                            return ("js-plugin-tinymce-".$key.'="'.$value.'"');
                        }, array_keys($config['JS']['tinymce']), $config['JS']['tinymce']));
                    }
                } ?>
                <?= (($config['HTML']['id'] ?? false) ? 'id="'.$config['HTML']['id'].'"' : '') ?>
                form-valid-update="<?= (isset($config['JS']['update']) && $config['JS']['update'] == false ? 'false' : 'true') ?>"
                <?= (($config['HTML']['disabled'] ?? false) ? 'disabled="disabled"' : '') ?>
                <?= (($config['HTML']['readonly'] ?? false) ? 'readonly="readonly"' : '') ?>
                <?= (($config['HTML']['name'] ?? false) ? 'name="'.$config['HTML']['name'].'"' : '') ?>><?= $config['HTML']['value'] ?></textarea>
            </div>
            <?php
            foreach (($config['HTML']['notes'] ?? array()) as $note) { ?>
                <span class="note ml-2">
                    <?= $note ?>
                </span>
            <?php }
            if (!empty($config['HTML']['name'])) { ?>
                <small class="text-danger" form-error="<?= str_replace(['][', '[', ']'], '.', preg_replace("/(\[)?\]/", '', $config['HTML']['name'])) ?>"></small>
            <?php }

        return ob_get_clean();
    }

    // if multiple, AJAX, and others, come from config
    static function select (array $config, string $language = NULL): string {
        if ($language) {
            if (!empty($config['HTML']['id'])) {
                $config['HTML']['id'] .= "-$language";
            }
            if (!empty($config['HTML']['name'])) {
                $config['HTML']['name'] .= "[$language]";
            }
        }
        if (isset($config['HTML']['multiple']) && $config['HTML']['multiple'] == true) {
            $config['HTML']['name'] .= "[]";
        }

        if (!is_array($config['HTML']['value'])) {
            $config['HTML']['value'] = (array)$config['HTML']['value'];
        }

        ob_start(); ?>

            <div <?= ($language ? 'language="'.$language.'"' : '') ?>>
                <select
                class="custom-select <?= $config['HTML']['class'] ?? '' ?>"
                <?= (($config['HTML']['id'] ?? false) ? 'id="'.$config['HTML']['id'].'"' : '') ?>
                <?= (($config['HTML']['name'] ?? false) ? 'name="'.$config['HTML']['name'].'"' : '') ?>
                <?php
                if (isset($config['JS']['multiselect'])) {
                    echo ('js-plugin-multiselect="'.($config['JS']['multiselect'] == true ? 'true' : 'false').'"');
                }
                if (isset($config['JS']['tagsinput'])) {
                    echo ('js-plugin-tagsinput="'.(!is_bool($config['JS']['tagsinput']) || $config['JS']['tagsinput'] == true ? 'true' : 'false').'"');

                    if (is_array($config['JS']['tagsinput'])) {
                        echo implode(' ', array_map(function ($key, $value) {
                            return ("js-plugin-tagsinput-".$key.'="'.$value.'"');
                        }, array_keys($config['JS']['tagsinput']), $config['JS']['tagsinput']));
                    }
                } ?>
                <?= (($config['HTML']['disabled'] ?? false) ? 'disabled="disabled"' : '') ?>
                <?= (($config['HTML']['readonly'] ?? false) ? 'readonly="readonly"' : '') ?>
                <?= ($config['HTML']['multiple'] == true ? 'multiple="multiple"' : '') ?>>
                    <?php
                    if (empty($config['JS']['multiselect'])) { ?>
                        <option value="" selected hidden><?= $config['HTML']['placeholder'] ?: 'Alege...' ?></option>
                    <?php }

                    foreach ($config['HTML']['values'] as $value => $text) { ?>
                        <option
                        value="<?= $value ?>"
                        <?= ($config['HTML']['readonly'] ? 'disabled="disabled"' : '') ?>
                        <?= (in_array($value, $config['HTML']['value']) ? 'selected' : '') ?>>
                            <?= $text ?>
                        </option>
                    <?php } ?>
                </select>
            </div>
            <?php
            foreach (($config['HTML']['notes'] ?? array()) as $note) { ?>
                <span class="note ml-2">
                    <?= $note ?>
                </span>
            <?php }
            if (!empty($config['HTML']['name'])) { ?>
                <small class="text-danger" form-error="<?= str_replace(['][', '[', ']'], '.', preg_replace("/(\[)?\]/", '', $config['HTML']['name'])) ?>"></small>
            <?php }

        return ob_get_clean();
    }

    static function icon (array $config, string $language = NULL): string {
        if ($language) {
            if (!empty($config['HTML']['id'])) {
                $config['HTML']['id'] .= "-$language";
            }
            if (!empty($config['HTML']['name'])) {
                $config['HTML']['name'] .= "[$language]";
            }
        }

        ob_start(); ?>

            <div class="input-group arshmodule-html arshmodule-html-field arshmodule-html-field-icon">
                <div class="input-group-prepend">
                    <select class="custom-select">
                        <option value="s" <?= (empty($config['HTML']['value']) || $config['HTML']['value'][2] == 's' ? 'selected' : '') ?>>
                            Solid
                        </option>
                        <option value="r" <?= (!empty($config['HTML']['value']) && $config['HTML']['value'][2] == 'r' ? 'selected' : '') ?>>
                            Regular
                        </option>
                        <option value="b" <?= (!empty($config['HTML']['value']) && $config['HTML']['value'][2] == 'b' ? 'selected' : '') ?>>
                            Brands
                        </option>
                    </select>
                </div>
                <input
                type="hidden"
                <?= (($config['HTML']['name'] ?? false) ? 'name="'.$config['HTML']['name'].'"' : '') ?>
                value="<?= $config['HTML']['value'] ?>" />
                <input type="text"
                class="form-control <?= $config['HTML']['class'] ?? '' ?>"
                <?= (($config['HTML']['id'] ?? false) ? 'id="'.$config['HTML']['id'].'"' : '') ?>
                placeholder="<?= $config['HTML']['placeholder'] ?? '' ?>"
                value="<?= substr($config['HTML']['value'], strpos($config['HTML']['value'], '-') + 1) ?>"
                form-valid-update="false"
                <?= (($config['HTML']['disabled'] ?? false) ? 'disabled="disabled"' : '') ?>
                <?= (($config['HTML']['readonly'] ?? false) ? 'readonly="readonly"' : '') ?>
                />
                <div class="input-group-append"
                data-toggle="tooltip" data-placement="left" title="fontawesome.com">
                    <a class="input-group-text" target="_blank"
                    href="https://fontawesome.com/icons?d=gallery&m=free&q=<?= substr($config['HTML']['value'], strpos($config['HTML']['value'], '-') + 1) ?>">
                        <i class="<?= $config['HTML']['value'] ?> fa-fw"></i>
                    </a>
                </div>
            </div>
            <?php
            foreach (($config['HTML']['notes'] ?? array()) as $note) { ?>
                <span class="note ml-2">
                    <?= $note ?>
                </span>
            <?php }
            if (!empty($config['HTML']['name'])) { ?>
                <small class="text-danger" form-error="<?= str_replace(['][', '[', ']'], '.', preg_replace("/(\[)?\]/", '', $config['HTML']['name'])) ?>"></small>
            <?php }

        return ob_get_clean();
    }

    static function number (array $config, string $language = NULL): string {
        if ($language) {
            if (!empty($config['HTML']['id'])) {
                $config['HTML']['id'] .= "-$language";
            }
            if (!empty($config['HTML']['name'])) {
                $config['HTML']['name'] .= "[$language]";
            }
        }

        ob_start(); ?>

            <div <?= ($language ? 'language="'.$language.'"' : '') ?>>
                <input
                type="number"
                class="form-control <?= $config['HTML']['class'] ?? '' ?>"
                placeholder="<?= $config['HTML']['placeholder'] ?? '' ?>"
                <?= (($config['HTML']['id'] ?? false) ? 'id="'.$config['HTML']['id'].'"' : '') ?>
                <?= (($config['HTML']['name'] ?? false) ? 'name="'.$config['HTML']['name'].'"' : '') ?>
                value="<?= $config['HTML']['value'] ?>"
                <?= (($config['HTML']['disabled'] ?? false) ? 'disabled="disabled"' : '') ?>
                <?= (($config['HTML']['readonly'] ?? false) ? 'readonly="readonly"' : '') ?>
                form-valid-update="<?= (empty($config['JS']['update']) ? 'false' : 'true') ?>" />
            </div>
            <?php
            foreach (($config['HTML']['notes'] ?? array()) as $note) { ?>
                <span class="note ml-2">
                    <?= $note ?>
                </span>
            <?php }
            if (!empty($config['HTML']['name'])) { ?>
                <small class="text-danger" form-error="<?= str_replace(['][', '[', ']'], '.', preg_replace("/(\[)?\]/", '', $config['HTML']['name'])) ?>"></small>
            <?php }

        return ob_get_clean();
    }

    static function radio (array $config, string $language = NULL): string {
        if ($language) {
            if (!empty($config['HTML']['id'])) {
                $config['HTML']['id'] .= "-$language";
            }
            if (!empty($config['HTML']['name'])) {
                $config['HTML']['name'] .= "[$language]";
            }
        }

        ob_start(); ?>

            <div <?= ($language ? 'language="'.$language.'"' : '') ?> class="my-2">
                <?php
                foreach ($config['HTML']['values'] as $value => $text) { ?>
                    <div class="custom-control custom-radio custom-control-inline pl-0">
                        <input
                        type="radio"
                        class="custom-control-input"
                        <?= (($config['HTML']['id'] ?? false) ? 'id="'.$config['HTML']['id'].'-'.$value.'"' : '') ?>
                        <?= (($config['HTML']['name'] ?? false) ? 'name="'.$config['HTML']['name'].'"' : '') ?>
                        value="<?= $value ?>"
                        <?= ($config['HTML']['value'] == $value ? 'checked' : '') ?>
                        <?= (($config['HTML']['disabled'] ?? false) ? 'disabled="disabled"' : '') ?>
                        <?= (($config['HTML']['readonly'] ?? false) ? 'readonly="readonly"' : '') ?>
                        />
                        <label class="custom-control-label" style="line-height: 24px;"
                        <?= (($config['HTML']['id'] ?? false) ? 'for="'.$config['HTML']['id'].'-'.$value.'"' : '') ?>>
                            <?= $text ?>
                        </label>
                    </div>
                <?php } ?>
            </div>
            <?php
            foreach (($config['HTML']['notes'] ?? array()) as $note) { ?>
                <span class="note ml-2">
                    <?= $note ?>
                </span>
            <?php }
            if (!empty($config['HTML']['name'])) { ?>
                <small class="text-danger" form-error="<?= str_replace(['][', '[', ']'], '.', preg_replace("/(\[)?\]/", '', $config['HTML']['name'])) ?>"></small>
            <?php }

        return ob_get_clean();
    }

    static function checkbox (array $config, string $language = NULL): string {
        if (!isset($config['HTML']['value'])) {
            $config['HTML']['value'] = 1;
        }
        if ($language) {
            if (!empty($config['HTML']['id'])) {
                $config['HTML']['id'] .= "-$language";
            }
            if (!empty($config['HTML']['name'])) {
                $config['HTML']['name'] .= "[$language]";
            }
        }

        ob_start(); ?>

            <div <?= ($language ? 'language="'.$language.'"' : '') ?> class="custom-control custom-checkbox d-flex pl-0 my-2">
                <input
                type="checkbox"
                class="custom-control-input"
                <?= (($config['HTML']['id'] ?? false) ? 'id="'.$config['HTML']['id'].'"' : '') ?>
                <?= (($config['HTML']['name'] ?? false) ? 'name="'.$config['HTML']['name'].'"' : '') ?>
                value="<?= $config['HTML']['value'] ?>"
                <?= (($config['HTML']['checked'] ?? false) ? 'checked' : '') ?>
                form-valid-update="<?= (empty($config['JS']['update']) ? 'false' : 'true') ?>"
                <?= (($config['HTML']['disabled'] ?? false) ? 'disabled="disabled"' : '') ?>
                <?= (($config['HTML']['readonly'] ?? false) ? 'readonly="readonly"' : '') ?>
                />
                <label class="custom-control-label" style="line-height: 18px; padding-top: 4px;"
                <?= (($config['HTML']['id'] ?? false) ? 'for="'.$config['HTML']['id'].'"' : '') ?>>
                    <?php
                    foreach (($config['HTML']['notes'] ?? array()) as $note) { ?>
                        <div><?= $note ?></div>
                    <?php } ?>
                </label>
            </div>
            <?php
            if (!empty($config['HTML']['name'])) { ?>
                <small class="text-danger" form-error="<?= str_replace(['][', '[', ']'], '.', preg_replace("/(\[)?\]/", '', $config['HTML']['name'])) ?>"></small>
            <?php }

        return ob_get_clean();
    }

    static function link (array $config, string $language = NULL): string {
        if ($language) {
            if (!empty($config['HTML']['id'])) {
                $config['HTML']['id'] .= "-$language";
            }
            if (!empty($config['HTML']['name'])) {
                $config['HTML']['name'] .= "[$language]";
            }
        }

        ob_start(); ?>

            <div class="input-group arshmodule-html arshmodule-html-field arshmodule-html-field-link">
                <input type="hidden"
                <?= (($config['HTML']['name'] ?? false) ? 'name="'.$config['HTML']['name'].'"' : '') ?>
                value="<?= $config['HTML']['value'] ?>" />

                <select class="custom-select input-group-prepend">
                    <option value="page" <?= (empty($config['HTML']['value']) || Web::exists($config['HTML']['value']) ? 'selected' : '') ?>>
                        Pagină
                    </option>
                    <option value="link" <?= (!empty($config['HTML']['value']) && !Web::exists($config['HTML']['value']) ? 'selected' : '') ?>>
                        Link
                    </option>
                </select>

                <select data-type="page"
                class="custom-select <?= (!empty($config['HTML']['value']) && Web::exists($config['HTML']['value']) == false ? 'd-none' : '') ?> <?= $config['HTML']['class'] ?? '' ?>"
                <?= (($config['HTML']['id'] ?? false) ? 'id="'.$config['HTML']['id'].'"' : '') ?>
                <?= (($config['HTML']['disabled'] ?? false) ? 'disabled="disabled"' : '') ?>
                <?= (($config['HTML']['readonly'] ?? false) ? 'readonly="readonly"' : '') ?>>
                    <option value="" selected>Nicio pagină</option>
                    <?php
                    foreach ($config['HTML']['values'] as $key => $text) { ?>
                        <option value="<?= $key ?>" <?= ($key == $config['HTML']['value'] ? 'selected' : '') ?>>
                            <?= $text ?>
                        </option>
                    <?php } ?>
                </select>

                <input data-type="link" type="text" title="link"
                class="form-control <?= (empty($config['HTML']['value']) || Web::exists($config['HTML']['value']) ? 'd-none' : '') ?> <?= $config['HTML']['class'] ?? '' ?>"
                <?= (($config['HTML']['id'] ?? false) ? 'id="'.$config['HTML']['id'].'"' : '') ?>
                placeholder="link"
                value="<?= (!empty($config['HTML']['value']) && !Web::exists($config['HTML']['value']) ? $config['HTML']['value'] : '') ?>"
                form-valid-update="true"
                <?= (($config['HTML']['disabled'] ?? false) ? 'disabled="disabled"' : '') ?>
                <?= (($config['HTML']['readonly'] ?? false) ? 'readonly="readonly"' : '') ?>
                />

                <!-- <div class="input-group-append">
                    <input type="text" title="parametri opționali..."
                    class="form-control input-group-text <?= $config['HTML']['class'] ?? '' ?>"
                    <?= (($config['HTML']['id'] ?? false) ? 'id="'.$config['HTML']['id'].'"' : '') ?>
                    placeholder="parametri..."
                    value="<?= substr($config['HTML']['value'], strpos($config['HTML']['value'], '-') + 1) ?>"
                    form-valid-update="false"
                    <?= (($config['HTML']['disabled'] ?? false) ? 'disabled="disabled"' : '') ?>
                    <?= (($config['HTML']['readonly'] ?? false) ? 'readonly="readonly"' : '') ?>
                    />
                </div> -->
            </div>
            <?php
            foreach (($config['HTML']['notes'] ?? array()) as $note) { ?>
                <span class="note ml-2">
                    <?= $note ?>
                </span>
            <?php }
            if (!empty($config['HTML']['name'])) { ?>
                <small class="text-danger" form-error="<?= str_replace(['][', '[', ']'], '.', preg_replace("/(\[)?\]/", '', $config['HTML']['name'])) ?>"></small>
            <?php }

        return ob_get_clean();
    }

    static function date (array $config, string $language = NULL): string {
        if ($language) {
            if (!empty($config['HTML']['id'])) {
                $config['HTML']['id'] .= "-$language";
            }
            if (!empty($config['HTML']['name'])) {
                $config['HTML']['name'] .= "[$language]";
            }
        }

        ob_start(); ?>

            <div <?= ($language ? 'language="'.$language.'"' : '') ?>>
                <input
                type="date"
                class="form-control <?= $config['HTML']['class'] ?? '' ?>"
                placeholder="<?= $config['HTML']['placeholder'] ?? '' ?>"
                <?= (($config['HTML']['id'] ?? false) ? 'id="'.$config['HTML']['id'].'"' : '') ?>
                <?= (($config['HTML']['name'] ?? false) ? 'name="'.$config['HTML']['name'].'"' : '') ?>
                value="<?= date('Y-m-d', $config['HTML']['value']) ?>"
                form-valid-update="<?= (empty($config['JS']['update']) ? 'false' : 'true') ?>"
                <?= (($config['HTML']['disabled'] ?? false) ? 'disabled="disabled"' : '') ?>
                <?= (($config['HTML']['readonly'] ?? false) ? 'readonly="readonly"' : '') ?>
                />
            </div>
            <?php
            foreach (($config['HTML']['notes'] ?? array()) as $note) { ?>
                <span class="note ml-2">
                    <?= $note ?>
                </span>
            <?php }
            if (!empty($config['HTML']['name'])) { ?>
                <small class="text-danger" form-error="<?= str_replace(['][', '[', ']'], '.', preg_replace("/(\[)?\]/", '', $config['HTML']['name'])) ?>"></small>
            <?php }

        return ob_get_clean();
    }

    static function color (array $config, string $language = NULL): string {
        if ($language) {
            if (!empty($config['HTML']['id'])) {
                $config['HTML']['id'] .= "-$language";
            }
            if (!empty($config['HTML']['name'])) {
                $config['HTML']['name'] .= "[$language]";
            }
        }

        ob_start(); ?>

            <div <?= ($language ? 'language="'.$language.'"' : '') ?>>
                <input
                type="color"
                class="form-control <?= $config['HTML']['class'] ?? '' ?>"
                <?= (($config['HTML']['id'] ?? false) ? 'id="'.$config['HTML']['id'].'"' : '') ?>
                <?= (($config['HTML']['name'] ?? false) ? 'name="'.$config['HTML']['name'].'"' : '') ?>
                form-valid-update="<?= (empty($config['JS']['update']) ? 'false' : 'true') ?>"
                <?= (!empty($config['HTML']['value']) ? 'value="'.$config['HTML']['value'].'"' : '') ?>
                <?= (($config['HTML']['disabled'] ?? false) ? 'disabled="disabled"' : '') ?>
                <?= (($config['HTML']['readonly'] ?? false) ? 'readonly="readonly"' : '') ?>
                />
            </div>
            <?php
            foreach (($config['HTML']['notes'] ?? array()) as $note) { ?>
                <span class="note ml-2">
                    <?= $note ?>
                </span>
            <?php }
            if (!empty($config['HTML']['name'])) { ?>
                <small class="text-danger" form-error="<?= str_replace(['][', '[', ']'], '.', preg_replace("/(\[)?\]/", '', $config['HTML']['name'])) ?>"></small>
            <?php }

        return ob_get_clean();
    }

    static function range (array $config, string $language = NULL): string {
        if ($language) {
            if (!empty($config['HTML']['id'])) {
                $config['HTML']['id'] .= "-$language";
            }
            if (!empty($config['HTML']['name'])) {
                $config['HTML']['name'] .= "[$language]";
            }
        }

        ob_start(); ?>

            <div <?= ($language ? 'language="'.$language.'"' : '') ?>>
                <input
                type="range"
                placeholder="<?= $config['HTML']['placeholder'] ?? '' ?>"
                <?= (($config['HTML']['id'] ?? false) ? 'id="'.$config['HTML']['id'].'"' : '') ?>
                <?= (($config['HTML']['name'] ?? false) ? 'name="'.$config['HTML']['name'].'"' : '') ?>
                form-valid-update="<?= (empty($config['JS']['update']) ? 'false' : 'true') ?>"
                <?= (($config['HTML']['disabled'] ?? false) ? 'disabled="disabled"' : '') ?>
                <?= (($config['HTML']['readonly'] ?? false) ? 'readonly="readonly"' : '') ?>
                />
            </div>
            <?php
            foreach (($config['HTML']['notes'] ?? array()) as $note) { ?>
                <span class="note ml-2">
                    <?= $note ?>
                </span>
            <?php }
            if (!empty($config['HTML']['name'])) { ?>
                <small class="text-danger" form-error="<?= str_replace(['][', '[', ']'], '.', preg_replace("/(\[)?\]/", '', $config['HTML']['name'])) ?>"></small>
            <?php }

        return ob_get_clean();
    }
}
