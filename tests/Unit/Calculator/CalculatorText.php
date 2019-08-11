<?php

namespace App\Tests\Unit\Calculator;

use App\Calculator\Calculator;
use App\Calculator\Exception\CalculatorException;
use PHPUnit\Framework\TestCase;

class CalculatorText extends TestCase
{
    /** @var Calculator */
    private $calculator;

    public function setUp()
    {
        $this->calculator = new Calculator();
    }

    public function testInvalidOperandException()
    {
        $this->expectException(CalculatorException::class);

        $this->calculator->calculate(1, 2, '&');
    }

    /**
     * @dataProvider sumData
     */
    public function testSum($v1, $v2, $expectedRes)
    {
        $actualRes = $this->calculator->calculate($v1, $v2, '+');

        $this->assertSame($expectedRes, $actualRes);
    }

    public function sumData()
    {
        return [
            [1, 2, 3.0],
            [1.0, 2.5, 3.5],
            [0.3, 0.7, 1.0],
            [-1, 2, 1.0],
            [-10, -1, -11.0],
            [5, -1, 4.0],
            [-1.5, 0.5, -1.0],
            [5.0, -2.5, 2.5],
            [0, -1.3, -1.3],
            [0, 1, 1.0],
            [0, 0, 0.0],
            [123456789101112131415, 123456789101112131415 , 2.4691357820222426E+20],
        ];
    }

    /**
     * @dataProvider subtractData
     */
    public function testSubtract($v1, $v2, $expectedRes)
    {
        $actualRes = $this->calculator->calculate($v1, $v2, '-');

        $this->assertSame($expectedRes, $actualRes);
    }

    public function subtractData()
    {
        return [
            [2, 1, 1.0],
            [1.0, 0.5, 0.5],
            [2.0, 1, 1.0],
            [4.4, 3.3, 1.1],
            [-2, 1, -3.0],
            [-2, -1, -1.0],
            [-0.2, 0.8, -1.0],
            [-0.5, -1, 0.5],
            [0, -1, 1.0],
            [0, 2, -2.0],
            [-0, 0, 0.0],
            [10, 123456789101112131415 , -1.2345678910111213E+20],
        ];
    }

    /**
     * @dataProvider multiplyData
     */
    public function testMultiply($v1, $v2, $expectedRes)
    {
        $actualRes = $this->calculator->calculate($v1, $v2, '*');

        $this->assertSame($expectedRes, $actualRes);
    }

    public function multiplyData()
    {
        return [
            [2, 2, 4.0],
            [2.0, 3.0, 6.0],
            [1.23, 4, 4.92],
            [4.4, 0.333, 1.4652000000000003],
            [-2, 3, -6.0],
            [-2, -3, 6.0],
            [-2.1, 2, -4.2],
            [0, 0, 0.0],
            [0, -0, 0.0],
            [0, -1, 0.0],
            [3, 123456789101112131415 , 3.703703673033364E+20],
        ];
    }

    /**
     * @dataProvider divideData
     */
    public function testDivide($v1, $v2, $expectedRes)
    {
        $actualRes = $this->calculator->calculate($v1, $v2, '/');

        $this->assertSame($expectedRes, $actualRes);
    }

    public function divideData()
    {
        return [
            [5, 2, 2.5],
            [4.4, 2.0, 2.2],
            [4, 2.0, 2.0],
            [-10, 5, -2.0],
            [10, 5.3, 1.8867924528301887],
            [1, 8.8, 0.11363636363636363],
            [-15, -5, 3.0],
            [0, 2, 0.0],
            [0, -2, 0.0],
            [123456789101112131415, 7, 1.7636684157301733E+19],
        ];
    }
}
