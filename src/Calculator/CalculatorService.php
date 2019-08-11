<?php declare(strict_types=1);

namespace App\Calculator;

use App\Calculator\Exception\CalculatorException;

class CalculatorService
{
    /** @var Calculator */
    private $calculator;
    /** @var CalculatorFieldsValidator */
    private $validator;

    public function __construct(Calculator $calculator, CalculatorFieldsValidator $validator)
    {
        $this->calculator = $calculator;
        $this->validator = $validator;
    }

    /**
     * @throws CalculatorException
     */
    public function calculate(string $value1, string $value2, string $operand): float
    {
        $this->validator->validateFields([$value1, $value2]);
        $this->validator->validateOperand($operand);

        return $this->calculator->calculate((float) $value1,(float) $value2, $operand);
    }
}