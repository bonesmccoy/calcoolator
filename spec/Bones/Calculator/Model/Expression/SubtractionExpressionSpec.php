<?php

namespace spec\Bones\Calculator\Model\Expression;

use Bones\Calculator\Model\Expression\NumericExpression;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class SubtractionExpressionSpec extends ObjectBehavior
{
    function let()
    {
        $this->beConstructedThrough('create', array(new NumericExpression(10), new NumericExpression(5)));
    }

    function it_is_initializable()
    {
        $this->shouldHaveType('Bones\Calculator\Model\Expression\SubtractionExpression');
        $this->shouldHaveType('Bones\Calculator\Model\Expression\AbstractOperation');
        $this->shouldHaveType('Bones\Calculator\Model\Expression\ExpressionInterface');
        $this->shouldHaveType('Bones\Calculator\Model\Expression\OperationInterface');
    }

    function it_has_a_value()
    {
        $this
            ->getValue()
            ->shouldReturnAnInstanceOf('Bones\Calculator\Model\Expression\NumericExpression');
    }

    function it_should_subtract_two_numbers()
    {
        $result = new NumericExpression(-5);
        $this->beConstructedThrough('create', array(new NumericExpression(15), new NumericExpression(20)));
        $this
            ->getValue()
            ->shouldBeLike($result);
    }

    function it_has_a_weight()
    {
        $this->getWeight()->shouldReturn(2);
    }
}
