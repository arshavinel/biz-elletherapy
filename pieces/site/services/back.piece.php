<?php

use App\Tables\Service;

$services = Service::select(array(
    'columns'   => "title:lg, price:lg, description:lg, has_page",
    'where'     => "visible = 1",
    'order'     => "`order` ASC, id_service DESC",
    'files'     => true
));
