<?php declare(strict_types=1);

namespace App\Calculator;

class CalculatorConst
{
    const ADDITION_OPERAND = '+';
    const SUBTRACTION_OPERAND = '-';
    const MULTIPLICATION_OPERAND = '*';
    const DIVISION_OPERAND = '/';

    const OPERANDS = [
        self::ADDITION_OPERAND,
        self::SUBTRACTION_OPERAND,
        self::MULTIPLICATION_OPERAND,
        self::DIVISION_OPERAND,
    ];

    const FIELD_INPUT_MAXLENGTH = 255;
}