<?php declare(strict_types=1);

namespace App\Calculator;

use App\Calculator\Exception\CalculatorException;

class CalculatorFieldsValidator
{
    /** @var int */
    private $maxLength;

    public function __construct(int $maxLength = CalculatorConst::FIELD_INPUT_MAXLENGTH)
    {
        $this->maxLength = $maxLength;
    }

    /**
     * @throws CalculatorException
     */
    public function validateFields(array $fields): void
    {
        foreach ($fields as $field) {
            if (strlen($field) > $this->maxLength) {
                throw new CalculatorException("Number exceeds maximum length");
            }

            if (! is_numeric($field)) {
                throw new CalculatorException("Fields must contain only numeric values");
            }
        }
    }

    /**
     * @throws CalculatorException
     */
    public function validateOperand(string $operand): void
    {
        if (! in_array($operand,CalculatorConst::OPERANDS)) {
            throw new CalculatorException(
                "Operand - {$operand} - is not valid or not supported yet"
            );
        }
    }
}