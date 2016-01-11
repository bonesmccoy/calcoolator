<?php

namespace Bones\Calculator\Model\Expression;

class DivisionExpression extends AbstractOperation implements ExpressionInterface, OperationInterface
{

    const WEIGHT = 2;

    public static function create(ExpressionInterface $dividend, ExpressionInterface $divisor)
    {
        $divisionExpression = new DivisionExpression($dividend, $divisor);

        return $divisionExpression;
    }

    public function getValue()
    {
        $result = $this->getDividend()->getValue() / $this->getDivisor()->getValue();

        return new NumericExpression($result);
    }

    private function getDividend()
    {
        return $this->firstValue;
    }


    private function getDivisor()
    {
        return $this->secondValue;
    }

}
