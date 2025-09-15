--TEST--
https://github.com/sebastianbergmann/phpunit/issues/1335
--FILE--
<?php
$_SERVER['argv'][1] = '--no-configuration';
$_SERVER['argv'][2] = '--bootstrap';
$_SERVER['argv'][3] = __DIR__ . '/1335/bootstrap1335.php_';
$_SERVER['argv'][4] = __DIR__ . '/1335/Issue1335Test.php_';

require __DIR__ . '/../../../bootstrap.php_';
PHPUnit\TextUI\Command::main();
--EXPECTF--
PHPUnit %s by Sebastian Bergmann and contributors.

............                                                      12 / 12 (100%)

Time: %s, Memory: %s

OK (12 tests, 12 assertions)
