<?php

namespace Bones\Calculator\Model;

use Bones\Calculator\Model\Expression\ExpressionInterface;

class ExpressionStack
{
    private $expressionStack;

    public function addExpression(ExpressionInterface $expression)
    {
        $this->expressionStack[] = $expression;
    }

    public function getExpressionStack()
    {
        return $this->expressionStack;
    }
}
