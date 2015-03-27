<?php

require_once 'inc.php';

class Test {

	public static function assertEquals($a, $b) {
		return assert($a == $b, "input arguments are not equals");
	}

	public static function assertTrue($cond) {
		return assert($cond == true, "condition is false, true expected");
	}

	public static function assertFalse($cond) {
		return assert($cond == false, "condition is true, false expected");
	}

	public static function assertInstance($token, $classname) {
		return self::assertTrue($token instanceof $classname);
	}

}

$calc = new Calculator();

Test::assertEquals($calc->run("1 + 2"), 3);

Test::assertEquals($calc->run("1 + 2 * 3 + 1"), 8);

Test::assertInstance(FinalExpression::factory("+"), "Addition");

Test::assertInstance(FinalExpression::factory("-9"), "Number");