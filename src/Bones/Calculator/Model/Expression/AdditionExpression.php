<?php

namespace Bones\Calculator\Model\Expression;

class AdditionExpression implements EvaluableInterface
{

    /**
     * @param NumericExpression $firstValue
     * @param NumericExpression $secondValue
     * @return NumericExpression
     */
    public function evaluate(NumericExpression $firstValue, NumericExpression $secondValue)
    {
        $value = $firstValue->getValue() + $secondValue->getValue();

        return new NumericExpression($value);
    }
}
