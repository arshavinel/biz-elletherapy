<?php

namespace App\Core\Module\Syntax\Frontend\Feature;

final class JS {

    static function tooltip (array $tooltip): array {
        $tooltip['placement']   = ($tooltip['placement'] ?? 'top');
        $tooltip['boundary']    = ($tooltip['boundary'] ?? 'window');

        return $tooltip;
    }

    static function confirmation (array $confirmation): array {
        $confirmation['placement']   = ($confirmation['placement'] ?? 'top');
        $confirmation['boundary']    = ($confirmation['boundary'] ?? 'viewport');

        return $confirmation;
    }

    static function ajax (array $ajax): array {
        $ajax['method'] = ($ajax['method'] ?? 'POST');

        return $ajax;
    }

    static function clipboard (array $clipboard): array {
        return $clipboard;
    }
}
