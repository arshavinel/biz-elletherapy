<?php

namespace Brain\Table\Article;

use Arsh\Core\Table;
use Brain\Language\LangSite;

final class Category extends Table {
    const TABLE       = 'article_categories';
    const PRIMARY_KEY = 'id_article_category';

    const TRANSLATOR    = LangSite::class;
    const TRANSLATED    = array('title');
}
