<?php

namespace Bones\Calculator\Command;

use Bones\Calculator\Calculator;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputDefinition;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;

class CalculatorCommand extends Command
{

    const NAME = 'calcoolator';
    const EXPRESSION_ARGUMENT = 'exp';

    protected function configure()
    {
        $this->setName('calcoolator')
            ->setDefinition(new InputDefinition(
                array(
                    new InputArgument(self::EXPRESSION_ARGUMENT, InputArgument::REQUIRED, 'Expression')
                )
            ));
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $calculator = new Calculator();

        $stringExpression = $input->getArgument(self::EXPRESSION_ARGUMENT);
        $calculationResult = $calculator->calculate($stringExpression);

        $output->writeln($calculationResult->getValue());
    }
}