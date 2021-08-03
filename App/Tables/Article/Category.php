<?php

namespace App\Tables\Article;

use App\Core\Table;
use App\Languages\LangSite;

final class Category extends Table {
    const TABLE       = 'article_categories';
    const PRIMARY_KEY = 'id_article_category';

    const TRANSLATOR    = LangSite::class;
    const TRANSLATED    = array('title');
}
