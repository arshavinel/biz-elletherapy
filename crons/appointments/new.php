<?php

// run it once per day (in the morning)

use Arsh\Core\Session;
use Arsh\Core\Mail;
use Arsh\Core\ENV;
use Arsh\Core\Web;
use Arsh\Core\DB;
use Brain\Table\Form\Appointment;
use Brain\Table\Config;

session_start();

require("../../ArshWell/Core/ENV.php");

DB::connect('default');
Session::set(ENV::url().ENV::db('conn.default.name'));
Web::fetch();

$appointments = Appointment::select(array(
    'columns'   => "firstname, lastname, phone, inserted_at",
    'where'     => "inserted_at >= UNIX_TIMESTAMP(CURDATE() + INTERVAL -1 DAY)"
));

if ($appointments) {
    Mail::send(
        'appointments/new',
        Config::title('email'),
        Brain\View\Site::sentence('subiect'),
        array(
            'appointments' => $appointments
        )
    );
}
