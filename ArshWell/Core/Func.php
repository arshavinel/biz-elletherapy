<?php

namespace App\Core;

/**
 * Core class for backend programming which has rutine functions.

 * @package App
 * @author Tanasescu Valentin <valentin_tanasescu.2000@yahoo.com>
*/
final class Func {

    static function rShuffle (array $list): array {
        $keys = array_keys($list);
        shuffle($keys);

        $random = array();
        foreach ($keys as $key) {
            $random[$key] = (!is_array($list[$key]) ? $list[$key] : self::rShuffle($list[$key]));
        }

        return $random;
    }

    static function keyFromBiggest (array $array): ?string {
        $max = NULL;
        $biggest = NULL;

        foreach ($array as $key => $number) {
            if (($max ?? $number) <= $number) {
                $max = $number;
                $biggest = $key;
            }
        }

        return $biggest;
    }

    static function keyFromSmallest (array $array): ?string {
        $min = NULL;
        $smallest = NULL;

        foreach ($array as $key => $number) {
            if (($min ?? $number) >= $number) {
                $min = $number;
                $smallest = $key;
            }
        }

        return $smallest;
    }

    static function closestUp (int $number, array $array): ?int {
        sort($array);

        foreach ($array as $a) {
            if ($a >= $number) {
                return $a;
            }
        }
        return NULL;
    }

    static function closestDown (int $number, array $array): ?int {
        rsort($array);

        foreach ($array as $a) {
            if ($a <= $number) {
                return $a;
            }
        }
        return NULL;
    }

    static function rUnique (array $array): array {
        return array_intersect_key($array, array_unique(array_map('serialize', $array)));
    }

    /**
     * Convert a multi-dimensional array into a single-dimensional array.
     * @author Sean Cannon, LitmusBox.com | seanc@litmusbox.com
     *
     * @param array $array The multi-dimensional array.
     */
    static function arrayFlatten (array $array): array {
        $result = array();
        foreach ($array as $key => $value) {
            if (is_array($value)) {
                $result = array_merge($result, self::arrayFlatten($value));
            }
            else {
                $result = array_merge($result, array($key => $value));
            }
        }
        return $result;
    }

    static function isAssoc (array $array): bool {
        return (array_keys($array) !== range(0, count($array) - 1));
    }

    static function readableTime (int $ms, int $precision = 2, string $separator = '', $units = array('ms','s','m','h')): string {
        if ($ms < 1000) {
            return round($ms, $precision).$separator.($units[0] ?? 'ms');
        }

        $seconds = $ms / 1000;
        if ($seconds < 60) {
            return round($seconds, $precision).$separator.($units[1] ?? 's');
        }

        $minutes = $seconds / 60;
        if ($minutes < 60) {
            return round($minutes, $precision).$separator.($units[2] ?? 'm');
        }

        $hours = $minutes / 60;
        return round($hours, $precision).$separator.($units[3] ?? 'h');
    }

    static function hasValidJSON (string $file): bool {
        json_decode(file_get_contents($file));

        return (json_last_error() == JSON_ERROR_NONE);
    }
}
