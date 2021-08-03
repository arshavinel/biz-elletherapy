<?php

use App\Core\Text;
use App\Tables\Event\Promo\Raffle\Join;

return function (array $params) {
    $message = array();

    foreach (Join::all("name, email") as $i => $join) {
        if (empty($join->name)) {
            $message[$i][] = $join->email; // source

            // converting email in readable name, as possible
            $join->name = ucwords(strstr(preg_replace(["/\s+/", "/\+\d+\@/"], [' ', '@'], str_replace(['_', '.'], ' ', $join->email)), '@', true));
            $join->edit();

            $message[$i][] = $join->name; // result
        }
    }

    return Text::chars(implode(' | ', array_map(function ($array) {
        return $array[0] .' in '. $array[1];
    }, $message)), 100);
};
