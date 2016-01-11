<?php

namespace Bones\Calculator\Model\Expression;

class NumericExpression implements ExpressionInterface
{
    public function __construct($numericValue)
    {
        $this->value = $numericValue;
    }

    public function getValue()
    {
        return $this->value;
    }
}
