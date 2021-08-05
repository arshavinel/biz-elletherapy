<?php

namespace App\Tables\Event;

use App\Core\Table;
use App\Languages\LangSite;

final class Group extends Table {
    const TABLE       = 'event_groups';
    const PRIMARY_KEY = 'id_meeting';

    const TRANSLATOR    = LangSite::class;
    const TRANSLATED    = array('title');
}
