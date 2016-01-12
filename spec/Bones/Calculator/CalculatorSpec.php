<?php

namespace spec\Bones\Calculator;

use Bones\Calculator\Model\Expression\NumericExpression;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class CalculatorSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('Bones\Calculator\Calculator');
    }

    function it_should_return_a_numeric_expression_from_a_given_string()
    {
        $inputString = "1 + 2";
        $this
            ->calculate($inputString)->shouldBeAnInstanceOf('Bones\Calculator\Model\Expression\NumericExpression');
    }

    function it_should_return_a_the_correct_expression_from_a_given_string()
    {
        $inputString = "1 + 2";
        $this
            ->calculate($inputString)->shouldBeLike(new NumericExpression(3));
    }
}
