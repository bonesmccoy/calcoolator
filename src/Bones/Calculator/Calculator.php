<?php

namespace Bones\Calculator;


use Bones\Calculator\Model\Expression\ExpressionInterface;
use Bones\Calculator\Model\ExpressionStack;
use Bones\Calculator\Model\StringExpressionParser;

class Calculator
{
    /**
     * @var ExpressionStack
     */
    private $expressionStack;

    /**
     * @var StringExpressionParser
     */
    private $inputParser;


    public function __construct()
    {
        $this->inputParser = new StringExpressionParser();

    }

    /**
     * @param $inputString
     * @return ExpressionInterface
     * @throws \Exception
     */
    public function calculate($inputString)
    {
        $inputString = $this->cleanInput($inputString);

        $this->expressionStack = $this->inputParser->parseString($inputString);

        while ($this->expressionStack->getExpressionStackSize() > 1) {

            $operationIndex = $this->expressionStack->getFirstHeaviestOperationPositionInStack();
            $precedingValueIndex = $operationIndex - 1;
            $followingValueIndex = $operationIndex + 1;

            $operationResultExpression = $this->evaluateOperation($operationIndex, $precedingValueIndex, $followingValueIndex);
            $this->expressionStack->addExpressionAt($operationIndex, $operationResultExpression);

            $this->reduceExpressionStack($precedingValueIndex, $followingValueIndex);
        }

        return $this->expressionStack->getExpressionAt(0);
    }


    /**
     * @param $input
     * @return string
     */
    protected function cleanInput($input)
    {
        $input = trim($input);

        return $input;
    }

    /**
     * @param $precedingValueIndex
     * @param $followingValueIndex
     */
    private function reduceExpressionStack($precedingValueIndex, $followingValueIndex)
    {
        $this->expressionStack->removeExpressionAt($precedingValueIndex);
        $this->expressionStack->removeExpressionAt($followingValueIndex);
        $this->expressionStack->compactStack();
    }

    /**
     * @param $operationIndex
     * @param $precedingValueIndex
     * @param $followingValueIndex
     * @return NumericExpression
     *
     * @throws \Exception
     */
    private function evaluateOperation($operationIndex, $precedingValueIndex, $followingValueIndex)
    {
        $operation = $this->expressionStack->getOperationAt($operationIndex);
        $precedingValue = $this->expressionStack->getExpressionAt($precedingValueIndex);
        $operation->setPrecedingValue($precedingValue);

        $followingValue = $this->expressionStack->getExpressionAt($followingValueIndex);
        $operation->setFollowingValue($followingValue);

        return $operation->getValue();
    }

}