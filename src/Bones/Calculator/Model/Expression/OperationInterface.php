<?php


namespace Bones\Calculator\Model\Expression;


interface OperationInterface
{
    public static function create(ExpressionInterface $firstValue, ExpressionInterface $secondValue);
}
