<?php

namespace Bones\Calculator\Model\Expression;

class AdditionExpression extends AbstractOperation implements ExpressionInterface, OperationInterface
{

    const WEIGHT = 1;

    /**
     * @param ExpressionInterface $firstValue
     * @param ExpressionInterface $secondValue
     * @return AdditionExpression
     */
    public static function create(ExpressionInterface $firstValue, ExpressionInterface $secondValue)
    {
        $additionExpression = new AdditionExpression($firstValue, $secondValue);

        return $additionExpression;
    }

    /**
     * @return NumericExpression
     */
    public function getValue()
    {
        $value = $this->getAugend()->getValue() + $this->getAddend()->getValue();

        return new NumericExpression($value);
    }

    private function getAugend()
    {
        return $this->firstValue;
    }

    private function getAddend()
    {
        return $this->secondValue;
    }

}
