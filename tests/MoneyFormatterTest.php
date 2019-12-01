<?php

namespace App\Tests;

use App\MoneyFormatter;
use App\NumberFormatter;
use PHPUnit\Framework\TestCase;


class MoneyFormatterTestCase extends TestCase
{

    public function numbersProviderDollar()
    {
        return [
            [2835779, '2.84M', '$2.84M'],
            [211.99, '211.99', '$211.99'],
        ];
    }

    /**
     * @dataProvider numbersProviderDollar
     */
    public function testMoneyFormatterDollar($input, $midValue, $expectedValue)
    {
        $numFormMock = $this->createMock(NumberFormatter::class);

        $numFormMock->method('format')->willReturn($midValue);

        $moneyFormatter = new MoneyFormatter($numFormMock);

        $this->assertEquals($expectedValue, $moneyFormatter->formatUsd($input));
    }

    public function numbersProviderEuro()
    {
        return [
            [2835779, '2.84M', '2.84M €'],
            [211.99, '211.99', '211.99 €'],
        ];
    }

    /**
     * @dataProvider numbersProviderEuro
     */
    public function testMoneyFormatterEuro($input, $midValue, $expectedValue)
    {
        $numFormMock = $this->createMock(NumberFormatter::class);

        $numFormMock->method('format')->willReturn($midValue);

        $moneyFormatter = new MoneyFormatter($numFormMock);
        $this->assertEquals($expectedValue, $moneyFormatter->formatEur($input));
    }
}