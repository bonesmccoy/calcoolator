<?php

namespace spec\Bones\Calculator;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class StringExpressionParserSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('Bones\Calculator\Model\StringExpressionParser');
    }

    function it_should_throw_an_exception_if_no_input_is_given()
    {
        $this->shouldThrow('\InvalidArgumentException')->during('parseString', array(''));
    }


    function it_should_parse_an_input_string()
    {
        $this->parseString("1 + 2")->shouldBeAnInstanceOf('Bones\Calculator\Model\ExpressionStack');
    }
}
