<?php

namespace spec\Bones\Calculator\Model\Expression;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class NumericExpressionSpec extends ObjectBehavior
{
    function let()
    {
        $this->beConstructedWith(100);
    }

    function it_is_initializable()
    {
        $this->shouldHaveType('Bones\Calculator\Model\Expression\NumericExpression');
        $this->shouldHaveType('Bones\Calculator\Model\Expression\ExpressionInterface');
    }

    function it_should_have_a_value()
    {
        $this->beConstructedWith(3);
        $this->getValue()->shouldReturn(3);
    }
}
