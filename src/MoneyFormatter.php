<?php

namespace App;

class MoneyFormatter
{
    public function __construct()
    {
    }

    public function formatEur($number): string
    {
        $format = new NumberFormatter();
        return $format->format($number) . ' €';
    }

    public function formatUsd($number): string
    {
        $format = new NumberFormatter();
        return '$' . $format->format($number);
    }

}