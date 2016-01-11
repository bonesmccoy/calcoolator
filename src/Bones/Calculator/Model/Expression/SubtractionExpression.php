<?php

namespace Bones\Calculator\Model\Expression;

class SubtractionExpression implements EvaluableInterface
{
    /**
     * @param NumericExpression $firstValue
     * @param NumericExpression $secondValue
     * @return NumericExpression
     */
    public function evaluate(NumericExpression $firstValue, NumericExpression $secondValue)
    {
        $scalarResult = $firstValue->getValue() - $secondValue->getValue();

        return new NumericExpression($scalarResult);
    }
}
