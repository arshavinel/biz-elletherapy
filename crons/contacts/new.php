<?php

// run it once per day (in the morning)

use Arshwell\Monolith\Session;
use Arshwell\Monolith\Mail;
use Arshwell\Monolith\StaticHandler;
use Arshwell\Monolith\Web;
use Arshwell\Monolith\DB;

use Arshavinel\ElleTherapy\Table\ContactForm;
use Arshavinel\ElleTherapy\Table\Config;

session_start();

require("../../ArshWell/Core/ENV.php");

DB::connect('default');
Session::set(StaticHandler::getEnvConfig('web.URL').ENV::db('conn.default.name'));
Web::fetch();

$contacts = ContactForm::select(array(
    'columns'   => "name, email, phone, inserted_at",
    'where'     => "inserted_at >= UNIX_TIMESTAMP(CURDATE() + INTERVAL -1 DAY)"
));

if ($contacts) {
    Mail::send(
        'contacts/new',
        Config::title('email'),
        Arshavinel\ElleTherapy\View\Site::sentence('subiect'),
        array(
            'contacts' => $contacts
        )
    );
}
