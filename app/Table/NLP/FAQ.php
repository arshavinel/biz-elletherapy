<?php

namespace Arshavinel\ElleTherapy\Table\NLP;

use Arshwell\Monolith\Table;

use Arshavinel\ElleTherapy\Language\LangSite;

final class FAQ extends Table {
    const TABLE       = 'nlp_faqs';
    const PRIMARY_KEY = 'id_faq';

    const TRANSLATOR    = LangSite::class;
    const TRANSLATED    = array('question', 'answer');
}
