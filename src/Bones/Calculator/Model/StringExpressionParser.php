<?php

namespace Bones\Calculator\Model;

use Bones\Calculator\Model\ExpressionFactory;
use Bones\Calculator\Model\ExpressionStack;

class StringExpressionParser
{

    public function parseString($inputString)
    {
        if (empty($inputString)) {
            throw new \InvalidArgumentException("Invalid Input String");
        }

        $expressionStack = new ExpressionStack();

        foreach($this->tokenize($inputString) as $token) {
            $expressionStack->addExpression(ExpressionFactory::factory($token));
        }

        return $expressionStack;
    }

    private function tokenize($inputString)
    {
        return explode(" ", $inputString);
    }
}
