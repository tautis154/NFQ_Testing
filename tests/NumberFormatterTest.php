<?php
namespace App\Tests;
use App\NumberFormatter;
use PHPUnit\Framework\TestCase;

class NumberFormatterTest extends TestCase
{
    /**
     * @dataProvider numbersProvider
     */
    public function testNumberFormatter($number, $expected)
    {
        $format = new NumberFormatter();
        $this->assertSame($expected, $format->format($number));
    }
    public function testEmpty()
    {
        $this->assertTrue(true);
    }
    public function numbersProvider()
    {
        return [
            [2835779, '2.84M'],
            [-2835779, '-2.84M'],
            [999500, '1.00M'],
            [-999500, '-1.00M'],
            [535216, '535K'],
            [-535216, '-535K'],
            [99950, '100K'],
            [-99950, '-100K'],
            [27533.78, '27 534'],
            [-27533.78, '-27 534'],
            [999.9999, '1 000'],
            [-999.9999, '-1 000'],
            [999.99, '999.99'],
            [-999.99, '-999.99'],
            [533.1, '533.10'],
            [-533.1, '-533.10'],
            [66.6666, '66.67'],
            [-66.6666, '-66.67'],
            [12.00, '12'],
            [-12.00, '-12']
        ];
    }
}