<?php

namespace Bones\Calculator\Model\Expression;

use Doctrine\Instantiator\Exception\InvalidArgumentException;

class NumericExpression implements ExpressionInterface
{
    public function __construct($numericValue)
    {
        if (!is_numeric($numericValue)) {
            throw new InvalidArgumentException("Only numeric values allowed");
        }
        $this->value = $numericValue;
    }

    public function getValue()
    {
        return $this->value;
    }
}
