<?php

namespace Bones\Calculator\Model\Expression;

class DivisionExpression extends AbstractOperation implements ExpressionInterface, OperationInterface
{

    const WEIGHT = 2;

    public function getValue()
    {
        $this->assertValuesAreValid();
        $result = $this->getDividend()->getValue() / $this->getDivisor()->getValue();

        return new NumericExpression($result);
    }

    private function getDividend()
    {
        return $this->precedingValue;
    }


    private function getDivisor()
    {
        return $this->followingValue;
    }

}
