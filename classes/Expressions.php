<?php

abstract class FinalExpression {

	public static $operators = array("+", "-", "*", "/");
	protected $value;
	protected $weight = 0;

	public function factory($token) {

		if (is_numeric($token)) return new Number($token);
		if (in_array($token, FinalExpression::$operators)) {
			switch($token) {
				case "+": return new Addition($token);
				break;
				case "-": return new Subtraction($token);
				break;
				case "*": return new Multiply($token);
				break;
				case "/": return new Divide($token);
			}
		}
		throw new Exception("invalid token");
	}


	public function __construct($value) {
		$this->value = $value;
	}

	public function getWeight() {
		return $this->weight;
	}

	public function getValue(){
		return $this->value;
	}

	function __toString() {
		return get_class($this) . " : " . $this->getValue();
	}
}

abstract class Operation extends FinalExpression {
	abstract public function evaluate($first_value, $second_value);
}

class Addition extends Operation {
	protected $weight = 1;
	public function evaluate($first_value, $second_value) {return new Number($first_value + $second_value);}
}

class Subtraction extends Operation {
	protected $weight = 1;
	public function evaluate($first_value, $second_value) {return new Number($first_value - $second_value);}
}

class Multiply extends Operation {
	protected $weight = 2;
	public function evaluate($first_value, $second_value) {return new Number($first_value * $second_value);}
}

class Divide extends Operation {
	protected $weight = 2;
	public function evaluate($first_value, $second_value) {return new Number($first_value / $second_value);}
}

class Number extends FinalExpression {
	public function evaluate($expr) { return null;}
}