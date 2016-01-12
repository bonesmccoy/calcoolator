<?php

namespace Bones\Calculator\Console;

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
     * @var Calculator
     */
    private $calculator;

    public function __construct()
    {
        $this->container = new ServiceContainer();
        $this->calculator = new Calculator();
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


        $stringExpression = $input->getFirstArgument();
        $calculationResult = $this->calculator->calculate($stringExpression);

        $output->writeln($calculationResult->getValue());

    }



}
