<?php

namespace Arshavinel\ElleTherapy\Table\Event;

use Arshwell\Monolith\Table;

use Arshavinel\ElleTherapy\Language\LangSite;

final class Group extends Table {
    const TABLE       = 'event_groups';
    const PRIMARY_KEY = 'id_meeting';

    const TRANSLATOR    = LangSite::class;
    const TRANSLATED    = array('title');
}
