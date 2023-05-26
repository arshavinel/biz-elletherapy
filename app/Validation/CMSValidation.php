<?php

namespace Arshavinel\ElleTherapy\Validation;

use Arshwell\Monolith\Table\TableValidation;

use Arshavinel\ElleTherapy\Language\LangCMS;

class CMSValidation extends TableValidation {
    const TABLE         = 'validations_cms';
    const PRIMARY_KEY   = NULL;

    const TRANSLATOR    = LangCMS::class;
}
