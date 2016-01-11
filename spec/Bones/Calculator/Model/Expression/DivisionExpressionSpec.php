<?php

namespace spec\Bones\Calculator\Model\Expression;

use Bones\Calculator\Model\Expression\NumericExpression;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class DivisionExpressionSpec extends ObjectBehavior
{
    function let()
    {
        $this->beConstructedThrough('create', array(new NumericExpression(1), new NumericExpression(2)));
    }

    function it_is_initializable()
    {
        $this->shouldHaveType('Bones\Calculator\Model\Expression\DivisionExpression');
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

    function it_should_divide_two_numbers()
    {
        $result = new NumericExpression(5);
        $this->beConstructedThrough('create', array(new NumericExpression(30), new NumericExpression(6)));
        $this
            ->getValue()
            ->shouldBeLike($result);
    }
}
