<?php

namespace Bones\Calculator\Model\Expression;

class SubtractionExpression extends AbstractOperation implements ExpressionInterface, OperationInterface
{

    const WEIGHT = 2;

    public static function create(ExpressionInterface $firstValue, ExpressionInterface $secondValue)
    {
        $subtractionExpression = new SubtractionExpression($firstValue, $secondValue);

        return $subtractionExpression;
    }

    public function getValue()
    {
        $result = $this->getMinvend()->getValue() - $this->getSubstrahend()->getValue();

        return new NumericExpression($result);
    }

    private function getMinvend()
    {
        return $this->firstValue;
    }

    private function getSubstrahend()
    {
        return $this->secondValue;
    }
}
