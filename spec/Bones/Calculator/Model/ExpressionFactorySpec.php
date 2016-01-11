<?php

namespace spec\Bones\Calculator\Model;

use Bones\Calculator\Model\Expression\AdditionExpression;
use Bones\Calculator\Model\Expression\DivisionExpression;
use Bones\Calculator\Model\Expression\MultiplicationExpression;
use Bones\Calculator\Model\Expression\NumericExpression;
use Bones\Calculator\Model\Expression\SubtractionExpression;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class ExpressionFactorySpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('Bones\Calculator\Model\ExpressionFactory');
    }


    function it_should_build_a_numeric_expression_if_input_is_numeric()
    {
        $this::factory(5)->shouldBeLike(new NumericExpression(5));
    }

    function it_should_build_a_addition_operation_if_input_is_the_plus_sign()
    {
        $this::factory('+')->shouldBeLike(new AdditionExpression());

    }

    function it_should_build_a_subtraction_operation_if_input_is_the_minus_sign()
    {
        $this::factory('-')->shouldBeLike(new SubtractionExpression());
    }

    function it_should_build_a_multiplication_operation_if_input_is_an_asterisk()
    {
        $this::factory('*')->shouldBeLike(new MultiplicationExpression());
    }

    function it_should_build_a_division_operation_if_input_is_a_slash()
    {
        $this::factory('/')->shouldBeLike(new DivisionExpression());
    }

    function it_should_thrown_an_exception_if_input_is_invalid()
    {
        $this
            ->shouldThrow('\InvalidArgumentException')
            ->during('factory', array('random'));
    }


}
