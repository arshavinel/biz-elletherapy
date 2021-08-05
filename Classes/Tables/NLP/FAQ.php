<?php

namespace App\Tables\NLP;

use App\Core\Table;
use App\Languages\LangSite;

final class FAQ extends Table {
    const TABLE       = 'nlp_faqs';
    const PRIMARY_KEY = 'id_faq';

    const TRANSLATOR    = LangSite::class;
    const TRANSLATED    = array('question', 'answer');
}
