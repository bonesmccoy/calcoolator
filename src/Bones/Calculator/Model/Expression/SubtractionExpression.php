<?php

namespace Bones\Calculator\Model\Expression;

class SubtractionExpression extends AbstractOperation implements OperationInterface
{

    const WEIGHT = 2;

    public function getValue()
    {
        $this->assertValuesAreValid();
        $result = $this->getMinvend()->getValue() - $this->getSubstrahend()->getValue();

        return new NumericExpression($result);
    }

    private function getMinvend()
    {
        return $this->precedingValue;
    }

    private function getSubstrahend()
    {
        return $this->followingValue;
    }
}
