<?php

namespace Bones\Calculator\Model\Expression;

class AdditionExpression extends AbstractOperation implements OperationInterface
{

    const WEIGHT = 1;

    /**
     * @return NumericExpression
     */
    public function getValue()
    {
        $this->assertValuesAreValid();

        $value = $this->getAugend()->getValue() + $this->getAddend()->getValue();

        return new NumericExpression($value);
    }

    private function getAugend()
    {
        return $this->precedingValue;
    }

    private function getAddend()
    {
        return $this->followingValue;
    }
}
