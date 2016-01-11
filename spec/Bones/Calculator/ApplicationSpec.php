<?php

namespace spec\Bones\Calculator;

use Bones\Calculator\Model\Expression\NumericExpression;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class ApplicationSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('Bones\Calculator\Application');
    }

    function it_should_return_a_numeric_value_after_parsing_a_string()
    {
        $this->run('1 + 2')->shouldBeLike(new NumericExpression(3));
    }
}
