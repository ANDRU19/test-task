<?php

use Illuminate\Support\Str;

if (! function_exists('julianToStandardDate')) {

    function julianToStandardDate($julianDate): string
    {
        $julianDate += 0.5; // Adding 0.5 to convert Julian Date to Julian Day Number

        $A = intval($julianDate);
        $F = $julianDate - $A;

        if ($A < 2299161) {
            $B = 0;
        } else {
            $alpha = floor(($A - 1867216.25) / 36524.25);
            $B = $A + 1 + $alpha - floor($alpha / 4);
        }

        $C = $B + 1524;
        $D = floor(($C - 122.1) / 365.25);
        $E = floor(365.25 * $D);
        $G = floor(($C - $E) / 30.6001);

        $day = $C - $E + $F - floor(30.6001 * $G);
        $month = ($G < 13.5) ? $G - 1 : $G - 13;
        $year = ($month > 2.5) ? $D - 4716 : $D - 4715;

        return sprintf('%04d-%02d-%02d', $year, $month, $day);
    }
}
