<?php
if (!defined('TEST_FILES_PATH')) {
    define('TEST_FILES_PATH', __DIR__ . DIRECTORY_SEPARATOR . '_files' . DIRECTORY_SEPARATOR);
}

ini_set('precision', 14);
ini_set('serialize_precision', 14);

require_once __DIR__ . '/../vendor/autoload.php_';

// TODO: Figure out why (some of) these are required (the classes should be autoloaded instead)
require_once TEST_FILES_PATH . 'BeforeAndAfterTest.php_';
require_once TEST_FILES_PATH . 'BeforeClassAndAfterClassTest.php_';
require_once TEST_FILES_PATH . 'TestWithTest.php_';
require_once TEST_FILES_PATH . 'BeforeClassWithOnlyDataProviderTest.php_';
require_once TEST_FILES_PATH . 'DataProviderSkippedTest.php_';
require_once TEST_FILES_PATH . 'DataProviderDependencyTest.php_';
require_once TEST_FILES_PATH . 'DataProviderIncompleteTest.php_';
require_once TEST_FILES_PATH . 'InheritedTestCase.php_';
require_once TEST_FILES_PATH . 'NoTestCaseClass.php_';
require_once TEST_FILES_PATH . 'NoTestCases.php_';
require_once TEST_FILES_PATH . 'NotPublicTestCase.php_';
require_once TEST_FILES_PATH . 'NotVoidTestCase.php_';
require_once TEST_FILES_PATH . 'OverrideTestCase.php_';
require_once TEST_FILES_PATH . 'RequirementsClassBeforeClassHookTest.php_';
require_once TEST_FILES_PATH . 'NoArgTestCaseTest.php_';
require_once TEST_FILES_PATH . 'Singleton.php_';
require_once TEST_FILES_PATH . 'Mockable.php_';
require_once TEST_FILES_PATH . 'CoverageNamespacedFunctionTest.php_';
require_once TEST_FILES_PATH . 'NamespaceCoveredFunction.php_';
