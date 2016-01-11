<?php

namespace spec\Bones\Calculator\Model;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class ExpressionFactorySpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('Bones\Calculator\Model\ExpressionFactory');
    }
}
