<?php

namespace Bones\Calculator\Model\Expression;

class NumericExpression
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
