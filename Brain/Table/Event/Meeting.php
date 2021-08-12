<?php

namespace Brain\Table\Event;

use Arsh\Core\Table;
use Brain\Language\LangSite;

final class Meeting extends Table {
    const TABLE       = 'event_meetings';
    const PRIMARY_KEY = 'id_meeting';

    const TRANSLATOR    = LangSite::class;
    const TRANSLATED    = array('title', 'slug');
}
