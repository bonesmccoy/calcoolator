<?php

namespace Bones\Calculator\Console;


use Bones\Calculator\Command\CalculatorCommand;
use PhpSpec\ServiceContainer;
use Symfony\Component\Console\Application as BaseApplication;
use Symfony\Component\Console\Input\InputInterface;

class Application extends BaseApplication
{
    /**
     * @var ServiceContainer
     */
    private $container;


    public function __construct()
    {
        parent::__construct('calcoolator', '1.0');
    }

    protected function getCommandName(InputInterface $input)
    {
        // This should return the name of your command.
        return CalculatorCommand::NAME;
    }


    protected function getDefaultCommands()
    {
        // Keep the core default commands to have the HelpCommand
        // which is used when using the --help option
        $defaultCommands = parent::getDefaultCommands();

        $defaultCommands[] = new CalculatorCommand();

        return $defaultCommands;
    }

    public function getDefinition()
    {
        $inputDefinition = parent::getDefinition();
        // clear out the normal first argument, which is the command name
        $inputDefinition->setArguments();

        return $inputDefinition;
    }



}
