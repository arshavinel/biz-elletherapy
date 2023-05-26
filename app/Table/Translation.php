<?php

namespace Arshavinel\ElleTherapy\Table;

use Arshwell\Monolith\Table\TableTranslation;

use Arshavinel\ElleTherapy\Language\LangSite;
use Arshavinel\ElleTherapy\Language\LangCMS;

final class Translation extends TableTranslation
{
    static function langsPerWebGroup (): array
    {
        return array(
            'site'  => LangSite::class,
            'cms'   => LangCMS::class,
            '404'   => array(
                'site'  => LangSite::class,
                'cms'   => LangCMS::class
            )
        );
    }
}
