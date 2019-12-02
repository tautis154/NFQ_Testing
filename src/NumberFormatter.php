<?php

namespace App;

class NumberFormatter
{
    public function __construct()
    {
    }

    public function format(float $number): string
    {
        if($number >= 995000 or $number <= -995000) {
            return number_format($number / 1000000, 2, '.', '') . 'M';
        }
        else if($number >= 99950 && $number < 995000 || $number <= -99950) {
            return round(($number / 1000)) . 'K';
        }
        else if ($number >= 1000 && $number < 99950 || $number <= -1000) {
            return number_format($number, 0, '', ' ');
        }
        else if ($number >= 0 && $number < 1000 || $number <= -0) {
            return str_replace('.00', '', number_format($number, 2, '.', ' '));
        }
        return number_format($number);
    }
}