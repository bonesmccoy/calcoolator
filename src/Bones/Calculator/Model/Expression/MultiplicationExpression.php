<?php

namespace Bones\Calculator\Model\Expression;

class MultiplicationExpression extends AbstractOperation implements ExpressionInterface, OperationInterface
{
    const WEIGHT = 1;

    public static function create(ExpressionInterface $firstValue, ExpressionInterface $secondValue)
    {
        $multiplyExpression = new MultiplicationExpression($firstValue, $secondValue);

        return $multiplyExpression;
    }

    public function getValue()
    {
        $result = $this->getMultiplicand()->getValue() * $this->getMultiplier()->getValue();

        return new NumericExpression($result);
    }

    public function getMultiplicand()
    {
        return $this->firstValue;
    }

    public function getMultiplier()
    {
        return $this->secondValue;
    }
}
