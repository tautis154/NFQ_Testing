<?php

namespace App\Tests;

use App\MoneyFormatter;
use App\NumberFormatter;
use PHPUnit\Framework\TestCase;

class MoneyFormatterTest extends TestCase
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
        $mock = $this->createMock(NumberFormatter::class);
        $mock->expects($this->exactly(1))
            ->method('format')
            ->with($input)
            ->willReturn($midValue);

        $formatter = new MoneyFormatter();
        $this->assertEquals($expectedValue, $formatter->formatUsd($mock->format($input)));
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

    public function testMoneyFormatterEuro($input, $midValue,  $expectedValue)
    {
        $mock = $this->createMock(NumberFormatter::class);
        $mock->expects($this->exactly(1))
            ->method('format')
            ->with($input)
            ->willReturn($midValue);

        $formatter = new MoneyFormatter();
        $this->assertEquals($expectedValue, $formatter->formatEur($mock->format($input)));
    }


    public function testEmpty()
    {
        $this->assertTrue(true);
    }
}
