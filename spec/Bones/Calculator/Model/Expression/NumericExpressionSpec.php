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
        $this->shouldHaveType('Bones\Calculator\Model\Expression\ScalarExpressionInterface');
    }

    function it_can_be_constructed_only_with_numeric_values()
    {
        $this->beConstructedWith('CIAO');
        $this->shouldThrow('\InvalidArgumentException')->duringInstantiation();
    }

    function it_can_be_evaluated()
    {
        $this->beConstructedWith(3);
        $this->getValue()->shouldReturn(3);
    }
}
