<?php
namespace Bones\Calculator\Model\Expression;

interface EvaluableInterface
{
    public function evaluate(NumericExpression $firstValue, NumericExpression $secondValue);

}
