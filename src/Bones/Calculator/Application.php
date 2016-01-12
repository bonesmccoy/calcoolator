<?php

namespace Bones\Calculator;

use Bones\Calculator\Model\Expression\NumericExpression;
use Bones\Calculator\Model\ExpressionStack;

use PhpSpec\ServiceContainer;
use Symfony\Component\Console\Application as BaseApplication;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class Application extends BaseApplication
{
    /**
     * @var ServiceContainer
     */
    private $container;

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
        $this->container = new ServiceContainer();
        parent::__construct('calcoolator', '1.0');
    }

    /**
     * @return ServiceContainer
     */
    public function getContainer()
    {
        return $this->container;
    }


    public function doRun(InputInterface $input, OutputInterface $output) {

        $input = $this->cleanInput($input->getFirstArgument());

        $this->expressionStack = $this->inputParser->parseEquationString($input);

        while ($this->expressionStack->getExpressionStackSize() > 1) {

            $operationIndex = $this->expressionStack->getFirstHeaviestOperationPositionInStack();
            $precedingValueIndex = $operationIndex - 1;
            $followingValueIndex = $operationIndex + 1;

            $operationResultExpression = $this->evaluateOperation($operationIndex, $precedingValueIndex, $followingValueIndex);
            $this->expressionStack->addExpressionAt($operationIndex, $operationResultExpression);

            $this->reduceExpressionStack($precedingValueIndex, $followingValueIndex);
        }

        $returnExpression = $this->expressionStack->getExpressionAt(0);
        $output->writeln($returnExpression->getValue());

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
