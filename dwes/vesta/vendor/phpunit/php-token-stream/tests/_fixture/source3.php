<?php
// This file is example#1
// from http://www.php.net/manual/en/function.get-included-files.php

include 'test1.php_';
include_once 'test2.php_';
require 'test3.php_';
require_once 'test4.php_';

$included_files = get_included_files();

foreach ($included_files as $filename) {
    echo "$filename\n";
}
