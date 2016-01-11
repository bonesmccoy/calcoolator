<?php


namespace Bones\Calculator\Model\Expression;


interface OperationInterface
{

    public function getWeight();

    public function setPrecedingValue(ExpressionInterface $precedingValue);

    public function setFollowingValue(ExpressionInterface $followingValue);
}
