<?php

namespace Bones\Calculator;

use Bones\Calculator\Model\Expression\OperationInterface;
use Bones\Calculator\Model\ExpressionStack;

class Application
{
    /**
     * @var ExpressionStack
     */
    private $expressionStack;

    /**
     * @var InputParser
     */
    private $inputParser;


    public function __construct()
    {
        $this->inputParser = new InputParser();
    }


    public function run($input) {

        $input = $this->cleanInput($input);

        $this->expressionStack = $this->inputParser->parseEquationString($input);

        while ($this->expressionStack->getExpressionStackSize() > 1) {

            $operationIndex = $this->expressionStack->getFirstHeaviestOperationPositionInStack();
            $precedingValueIndex = $operationIndex - 1;
            $followingValueIndex = $operationIndex + 1;

            $operation = $this->expressionStack->getOperationAt($operationIndex);
            $precedingValue = $this->expressionStack->getExpressionAt($precedingValueIndex);
            $operation->setPrecedingValue($precedingValue);

            $followingValue = $this->expressionStack->getExpressionAt($followingValueIndex);
            $operation->setFollowingValue($followingValue);

            $newNumericValue = $operation->getValue();

            $this->expressionStack->removeExpressionAt($precedingValueIndex);
            $this->expressionStack->removeExpressionAt($followingValueIndex);
            $this->expressionStack->addExpressionAt($operationIndex, $newNumericValue);
            $this->expressionStack->compactStack();
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

}
