<?php

namespace Bones\Calculator\Model\Expression;


abstract class AbstractOperation implements ExpressionInterface
{
    /**
     * @var ExpressionInterface
     */
    protected $precedingValue;
    /**
     * @var ExpressionInterface
     */
    protected $followingValue;

    public function getWeight()
    {
        return static::WEIGHT;
    }

    /**
     * @return ExpressionInterface
     */
    public function getFollowingValue()
    {
        return $this->followingValue;
    }

    /**
     * @param ExpressionInterface $followingValue
     */
    public function setFollowingValue(ExpressionInterface $followingValue)
    {
        $this->followingValue = $followingValue;
    }

    /**
     * @return ExpressionInterface
     */
    public function getPrecedingValue()
    {
        return $this->precedingValue;
    }

    /**
     * @param ExpressionInterface $precedingValue
     */
    public function setPrecedingValue(ExpressionInterface $precedingValue)
    {
        $this->precedingValue = $precedingValue;
    }

    protected function assertValuesAreValid()
    {
        if (!($this->precedingValue instanceof ExpressionInterface) ||
            !($this->followingValue instanceof ExpressionInterface)
            ) {
            throw new \InvalidArgumentException();
        }
    }


}
