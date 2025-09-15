--TEST--
PHPT for testing coverage
--FILE--
<?php
require __DIR__ . '/../bootstrap.php_';
$coveredClass = new CoveredClass();
$coveredClass->publicMethod();
--EXPECT--
