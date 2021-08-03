<?php

// run it once per day (in the morning)

use App\Core\Session;
use App\Core\Mail;
use App\Core\ENV;
use App\Core\Web;
use App\Core\DB;
use App\Tables\Form\Appointment;
use App\Tables\Config;

session_start();

require("../../App/Core/ENV.php");

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
        App\Views\Site::sentence('subiect'),
        array(
            'appointments' => $appointments
        )
    );
}
