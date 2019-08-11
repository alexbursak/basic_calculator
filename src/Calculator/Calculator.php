<?php declare(strict_types=1);

namespace App\Calculator;

use App\Calculator\Exception\CalculatorException;

class Calculator
{
    /**
     * @throws CalculatorException
     */
    public function calculate(float $value1, float $value2, string $operand): float
    {
        if ($operand === CalculatorConst::ADDITION_OPERAND) {
            return $this->sum($value1, $value2);
        } elseif ($operand === CalculatorConst::SUBTRACTION_OPERAND) {
            return $this->subtract($value1, $value2);
        } elseif ($operand === CalculatorConst::MULTIPLICATION_OPERAND) {
            return $this->multiply($value1, $value2);
        } elseif ($operand === CalculatorConst::DIVISION_OPERAND) {
            return $this->divide($value1, $value2);
        }

        throw new CalculatorException("Operand - {$operand} - is not valid or not supported yet");
    }

    private function sum(float $value1, float $value2): float
    {
        return (float) $value1 + $value2;
    }

    private function subtract(float $value1, float $value2): float
    {
        return (float) $value1 - $value2;
    }

    private function multiply(float $value1, float $value2): float
    {
        return (float) $value1 * $value2;
    }

    /**
     * @throws CalculatorException
     */
    private function divide(float $value1, float $value2): float
    {
        try {
            return (float) $value1 / $value2;
        } catch (\ErrorException $e) {
            // handle division by zero
            throw new CalculatorException($e->getMessage());
        }
    }
}