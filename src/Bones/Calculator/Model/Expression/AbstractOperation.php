<?php

namespace Bones\Calculator\Model\Expression;


abstract class AbstractOperation
{
    /**
     * @var ExpressionInterface
     */
    protected $firstValue;
    /**
     * @var ExpressionInterface
     */
    protected $secondValue;

    /**
     * @param ExpressionInterface $firstValue
     * @param ExpressionInterface $secondValue
     */
    protected function __construct(ExpressionInterface $firstValue, ExpressionInterface $secondValue)
    {
        $this->firstValue = $firstValue;
        $this->secondValue = $secondValue;
    }

    public function getWeight()
    {
        return static::WEIGHT;
    }
}
