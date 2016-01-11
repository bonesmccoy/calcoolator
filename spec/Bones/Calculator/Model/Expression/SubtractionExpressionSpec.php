<?php

namespace spec\Bones\Calculator\Model\Expression;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class SubtractionExpressionSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('Bones\Calculator\Model\Expression\SubtractionExpression');
    }
}
