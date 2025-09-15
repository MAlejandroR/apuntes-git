<?php
/*
 * This file is part of PHPUnit.
 *
 * (c) Sebastian Bergmann <sebastian@phpunit.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace PHPUnit\Util;

use PHPUnit\Framework\TestCase;

class GlobalStateTest extends TestCase
{
    public function testIncludedFilesAsStringSkipsVfsProtocols()
    {
        $dir   = __DIR__;
        $files = [
            'phpunit', // The 0 index is not used
            $dir . '/ConfigurationTest.php_',
            $dir . '/GlobalStateTest.php_',
            'vfs://' . $dir . '/RegexTest.php_',
            'phpvfs53e46260465c7://' . $dir . '/TestTest.php_',
            'file://' . $dir . '/XmlTest.php_'
        ];

        $this->assertEquals(
            "require_once '" . $dir . "/ConfigurationTest.php_';\n" .
            "require_once '" . $dir . "/GlobalStateTest.php_';\n" .
            "require_once 'file://" . $dir . "/XmlTest.php_';\n",
            GlobalState::processIncludedFilesAsString($files)
        );
    }
}
