<?php

namespace Bones\Calculator\Model;

use Bones\Calculator\Model\Expression\AbstractOperation;
use Bones\Calculator\Model\Expression\ExpressionInterface;
use Bones\Calculator\Model\Expression\OperationInterface;

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

    public function getExpressionStackSize()
    {
        return count($this->expressionStack);
    }

    public function getFirstHeaviestOperationPositionInStack()
    {
        $weight = 0;
        $heaviestOperationIndex = null;

        foreach($this->expressionStack as $key => $expression) {
            if ($expression instanceof OperationInterface) {
                if ($expression->getWeight() > $weight) {
                    $weight = $expression->getWeight();
                    $heaviestOperationIndex = $key;
                }
            }
        }

        return $heaviestOperationIndex;
    }

    /**
     * @param $index
     * @return AbstractOperation
     * @throws \Exception
     */
    public function getOperationAt($index)
    {

        $expression = null;
        if (isset($this->expressionStack[$index])) {
            $expression =  $this->expressionStack[$index];
        }

        if (!($expression instanceof AbstractOperation)) {
            throw new \Exception("$index index doesn't exists or not of the type Operation");
        }

        return $expression;
    }

    /**
     * @param $index
     * @return ExpressionInterface
     * @throws \Exception
     */
    public function getExpressionAt($index)
    {
        $expression = null;
        if (isset($this->expressionStack[$index])) {
            $expression =  $this->expressionStack[$index];
        }

        if (!($expression instanceof ExpressionInterface)) {
            throw new \Exception("$index index doesn't exists");
        }

        return $expression;
    }

    public function removeExpressionAt($index)
    {
        unset($this->expressionStack[$index]);
    }

    public function addExpressionAt($index, ExpressionInterface $expression)
    {
        $this->expressionStack[$index] = $expression;
    }

    public function compactStack()
    {
        $this->expressionStack = array_values($this->expressionStack);
    }
}
