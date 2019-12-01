<?php

namespace App;

class MoneyFormatter
{
    private $formatter;

    public function __construct(NumberFormatter $formatter) {
        $this->formatter = $formatter;
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