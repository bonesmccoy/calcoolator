<?php

require_once 'autoload.php';


if ($argc < 2) {
	echo <<<USG
USAGE:
php calc.php "expression"

USG;
exit(0);
}

$expr = $argv[1];

$calc = new Calculator();
echo $calc->run($expr) . "\n";
