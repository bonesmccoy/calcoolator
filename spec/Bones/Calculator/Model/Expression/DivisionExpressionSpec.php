<?php

namespace spec\Bones\Calculator\Model\Expression;

use Bones\Calculator\Model\Expression\NumericExpression;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class DivisionExpressionSpec extends ObjectBehavior
{

    function it_is_initializable()
    {
        $this->shouldHaveType('Bones\Calculator\Model\Expression\DivisionExpression');
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

    function it_should_divide_two_numbers()
    {
        $this->setPrecedingValue(new NumericExpression(10));
        $this->setFollowingValue(new NumericExpression(5));

        $result = new NumericExpression(2);
        $this
            ->getValue()
            ->shouldBeLike($result);
    }

    function it_has_a_weight()
    {
        $this->getWeight()->shouldReturn(2);
    }
}
