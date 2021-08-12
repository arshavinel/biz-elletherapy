<?php

namespace Brain\Table\NLP;

use Arsh\Core\Table;
use Brain\Language\LangSite;

final class FAQ extends Table {
    const TABLE       = 'nlp_faqs';
    const PRIMARY_KEY = 'id_faq';

    const TRANSLATOR    = LangSite::class;
    const TRANSLATED    = array('question', 'answer');
}
