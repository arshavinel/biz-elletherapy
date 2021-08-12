<?php

// run it once per day (in the morning)

use Arsh\Core\Session;
use Arsh\Core\Mail;
use Arsh\Core\ENV;
use Arsh\Core\Web;
use Arsh\Core\DB;
use Brain\Table\ContactForm;
use Brain\Table\Config;

session_start();

require("../../ArshWell/Core/ENV.php");

DB::connect('default');
Session::set(ENV::url().ENV::db('conn.default.name'));
Web::fetch();

$contacts = ContactForm::select(array(
    'columns'   => "name, email, phone, inserted_at",
    'where'     => "inserted_at >= UNIX_TIMESTAMP(CURDATE() + INTERVAL -1 DAY)"
));

if ($contacts) {
    Mail::send(
        'contacts/new',
        Config::title('email'),
        Brain\View\Site::sentence('subiect'),
        array(
            'contacts' => $contacts
        )
    );
}
