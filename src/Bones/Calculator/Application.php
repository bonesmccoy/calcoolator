<?php

namespace Bones\Calculator;

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

        $expressionStack = $this->inputParser->parseEquationString($input);

        // do while until stack lenght is 1
        do {
            //var_dump("STACK",  implode (" | ", $this->stack));

            $current_weight = 0;
            $found_key = null;
            $value = null;

            //find the heavyest operation in stack
            foreach($this->stack as $key => $el) {
                if ($el instanceof Number) continue;
                //retrieve the operator with highest height;
                if ($el->getWeight() > $current_weight) {
                    $current_weight = $el->getWeight();
                    $found_key = $key;
                    $operation = $el;
                }
            }

            //execute it and retrieve a value
            $first_number = $this->stack[$found_key - 1];
            $second_number = $this->stack[$found_key + 1];
            if (!(($first_number instanceof Number) && ($second_number instanceof Number))) {
                throw new Exception("Malformed input string");
            }

            $value = $operation->evaluate($first_number->getValue(), $second_number->getValue() );

            //substitute the element in the stack with the index of operator with the value found
            //unset the used values
            $this->stack[$found_key] = $value;
            unset($this->stack[$found_key-1]);
            unset($this->stack[$found_key+1]);
            //reset the $stack indexes
            $this->stack = array_values($this->stack);


        } while ( count($this->stack) > 1 );
        //var_dump("STACK",  implode (" | ", $this->stack));
        return $this->stack[0]->getValue();
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
