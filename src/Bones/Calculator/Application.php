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
            $operation = $this->expressionStack->getOperationAt($operationIndex);

            $precedingValue = $this->expressionStack->getExpressionAt($operationIndex - 1);
            $operation->setPrecedingValue($precedingValue);

            $followingValue = $this->expressionStack->getExpressionAt($operationIndex + 1);
            $operation->setFollowingValue($followingValue);

            $newNumericValue = $operation->getValue();

            $this->expressionStack->removeExpressionAt($precedingValue);
            $this->expressionStack->removeExpressionAt($followingValue);
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
