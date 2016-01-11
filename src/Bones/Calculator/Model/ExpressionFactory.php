<?php

namespace Bones\Calculator\Model;

use Bones\Calculator\Model\Expression\AdditionExpression;
use Bones\Calculator\Model\Expression\DivisionExpression;
use Bones\Calculator\Model\Expression\ExpressionInterface;
use Bones\Calculator\Model\Expression\MultiplicationExpression;
use Bones\Calculator\Model\Expression\NumericExpression;
use Bones\Calculator\Model\Expression\SubtractionExpression;

class ExpressionFactory
{
    const ADDITION_OPERATOR = '+';
    const SUBTRACTION_OPERATOR = '-';
    const MULTIPLICATION_OPERATOR = '*';
    const DIVISION_OPERATOR = '/';

    private static $operators = array(
        self::ADDITION_OPERATOR,
        self::SUBTRACTION_OPERATOR,
        self::MULTIPLICATION_OPERATOR,
        self::DIVISION_OPERATOR
    );

    /**
     * @param $parsedToken
     * @return ExpressionInterface
     */
    public static function factory($parsedToken)
    {
        $expression = null;
        if (is_numeric($parsedToken)) {
            $expression = new NumericExpression($parsedToken);
        } else {

            switch($parsedToken) {
                case self::ADDITION_OPERATOR:
                    $expression = new AdditionExpression();
                    break;
                case self::SUBTRACTION_OPERATOR:
                    $expression = new SubtractionExpression();
                    break;
                case self::MULTIPLICATION_OPERATOR:
                    $expression = new MultiplicationExpression();
                    break;
                case self::DIVISION_OPERATOR:
                    $expression = new DivisionExpression();
                    break;
            }
        }

        if (is_null($expression)) {
            throw new \InvalidArgumentException("Invalid input argument");
        }

        return $expression;
    }
}
