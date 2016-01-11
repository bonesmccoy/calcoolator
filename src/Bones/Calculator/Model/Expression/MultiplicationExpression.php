<?php

namespace Bones\Calculator\Model\Expression;

class MultiplicationExpression extends AbstractOperation implements OperationInterface
{
    const WEIGHT = 2;

    public function getValue()
    {
        $this->assertValuesAreValid();
        $result = $this->getMultiplicand()->getValue() * $this->getMultiplier()->getValue();

        return new NumericExpression($result);
    }

    public function getMultiplicand()
    {
        return $this->precedingValue;
    }

    public function getMultiplier()
    {
        return $this->followingValue;
    }
}
