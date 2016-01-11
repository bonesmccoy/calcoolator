<?php

namespace spec\Bones\Calculator\Model;

use Bones\Calculator\Model\Expression\AdditionExpression;
use Bones\Calculator\Model\Expression\NumericExpression;
use Bones\Calculator\Model\Expression\SubtractionExpression;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class ExpressionStackSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('Bones\Calculator\Model\ExpressionStack');
    }

    function it_is_a_collection()
    {
        $this->addExpression(new NumericExpression(1));
        $this->getExpressionStack()->shouldHaveCount(1);
    }

    function it_contains_a_collection_of_ExpressionInterfaces()
    {
        $returnValue = array(new NumericExpression(1));

        $this->addExpression    (new NumericExpression(1));
        $this->getExpressionStack()->shouldBeLike($returnValue);
    }

    function it_should_return_the_first_heaviest_operation_position_in_the_stack()
    {
        $this->addExpression(new SubtractionExpression());
        $this->addExpression(new AdditionExpression());

        $this->getFirstHeaviestOperationPositionInStack()->shouldBeLike(1);
    }

}
