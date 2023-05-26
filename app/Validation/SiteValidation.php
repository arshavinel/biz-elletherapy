<?php

namespace Arshavinel\ElleTherapy\Validation;

use Arshwell\Monolith\Table\TableValidation;

use Arshavinel\ElleTherapy\Language\LangSite;

class SiteValidation extends TableValidation {
    const TABLE         = 'validations_site';
    const PRIMARY_KEY   = NULL;

    const TRANSLATOR    = LangSite::class;
}
