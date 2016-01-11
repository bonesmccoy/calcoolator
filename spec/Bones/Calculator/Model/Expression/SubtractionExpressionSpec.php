<?php

namespace spec\Bones\Calculator\Model\Expression;

use Bones\Calculator\Model\Expression\NumericExpression;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class SubtractionExpressionSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('Bones\Calculator\Model\Expression\SubtractionExpression');
        $this->shouldHaveType('Bones\Calculator\Model\Expression\ExpressionInterface');
    }

    function it_can_be_evaulated()
    {
        $this->evaluate(new NumericExpression(1), new NumericExpression(2));
    }

    function it_should_return_a_NumericExpression_object()
    {
        $this
            ->evaluate(new NumericExpression(2), new NumericExpression(1))
            ->shouldReturnAnInstanceOf('Bones\Calculator\Model\Expression\NumericExpression');
    }

    function it_should_subtract_two_numbers()
    {
        $result = new NumericExpression(3);
        $this
            ->evaluate(new NumericExpression(2), new NumericExpression(1))
            ->shouldBeLike($result);
    }
}
