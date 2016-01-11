<?php

namespace spec\Bones\Calculator;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class InputParserSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('Bones\Calculator\InputParser');
    }

    function it_should_throw_an_exception_if_no_input_is_given()
    {
        $this->shouldThrow('\InvalidArgumentException')->during('parseEquationString', array(''));
    }


    function it_should_parse_an_input_string()
    {
        $this->parseEquationString("1 + 2")->shouldBeAnInstanceOf('Bones\Calculator\Model\ExpressionStack');
    }
}
