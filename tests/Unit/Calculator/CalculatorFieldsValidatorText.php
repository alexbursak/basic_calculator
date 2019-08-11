<?php

namespace App\Tests\Unit\Calculator;

use App\Calculator\CalculatorFieldsValidator;
use App\Calculator\Exception\CalculatorException;
use PHPUnit\Framework\TestCase;

class CalculatorFieldsValidatorText extends TestCase
{
    /** @var CalculatorFieldsValidator */
    private $validator;

    public function setUp()
    {
        $this->validator = new CalculatorFieldsValidator(10);
    }

    public function testValidateFields()
    {
        $numbers = [
            '123',
            '1.23',
            '-123',
            '-1.23',
            '+123',
            '+1.23',
            '+1.23',
        ];

        $this->validator->validateFields($numbers);

        $this->addToAssertionCount(1);
    }

    public function testValidateFieldsException()
    {
        $numbers = [
            '',
            ' ',
            '1,23',
            '1 23',
            'null',
            '0',
            'text test',
            '%$#',
            '1234567891011',
        ];

        $this->expectException(CalculatorException::class);

        $this->validator->validateFields($numbers);
    }

    /**
     * @dataProvider operandsProvider
     */
    public function testValidateOperand($operand)
    {
        $this->validator->validateOperand($operand);

        $this->addToAssertionCount(1);
    }

    /**
     * @dataProvider invalidOperandsProvider
     */
    public function testValidateOperandException($operand)
    {
        $this->expectException(CalculatorException::class);

        $this->validator->validateOperand($operand);
    }

    public function operandsProvider()
    {
        return [
            ['+'],
            ['-'],
            ['*'],
            ['/'],
        ];
    }

    public function invalidOperandsProvider()
    {
        return [
            [''],
            ['%!'],
            ['$'],
            ['text'],
            ['some string with multiple words'],
            ['0'],
            ['++'],
            ['null'],
            ['//\\'],
        ];
    }
}
