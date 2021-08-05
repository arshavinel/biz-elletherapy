<?php

namespace App\Tables\Event;

use App\Core\Table;
use App\Languages\LangSite;

final class Meeting extends Table {
    const TABLE       = 'event_meetings';
    const PRIMARY_KEY = 'id_meeting';

    const TRANSLATOR    = LangSite::class;
    const TRANSLATED    = array('title', 'slug');
}
