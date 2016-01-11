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
        $this->shouldHaveType('Bones\Calculator\Model\Expression\AbstractOperation');
        $this->shouldHaveType('Bones\Calculator\Model\Expression\ExpressionInterface');
        $this->shouldHaveType('Bones\Calculator\Model\Expression\OperationInterface');
    }

    function it_should_throw_an_exception_if_values_not_set()
    {
        $this->shouldThrow('\InvalidArgumentException')->during('getValue');
    }

    function it_has_a_value()
    {
        $this->setPrecedingValue(new NumericExpression(5));
        $this->setFollowingValue(new NumericExpression(10));
        $this
            ->getValue()
            ->shouldReturnAnInstanceOf('Bones\Calculator\Model\Expression\NumericExpression');
    }

    function it_should_subtract_two_numbers()
    {
        $this->setPrecedingValue(new NumericExpression(5));
        $this->setFollowingValue(new NumericExpression(10));
        $result = new NumericExpression(-5);
        $this
            ->getValue()
            ->shouldBeLike($result);
    }

    function it_has_a_weight()
    {
        $this->getWeight()->shouldReturn(2);
    }
}
