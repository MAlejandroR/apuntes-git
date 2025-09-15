<?php
/*
 * This file is part of php_-token-stream.
 *
 * (c) Sebastian Bergmann <sebastian@phpunit.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

use PHPUnit\Framework\TestCase;

class PHP_Token_IncludeTest extends TestCase
{
    /**
     * @var PHP_Token_Stream
     */
    private $ts;

    protected function setUp()
    {
        $this->ts = new PHP_Token_Stream(TEST_FILES_PATH . 'source3.php_');
    }

    /**
     * @covers PHP_Token_Includes::getName
     * @covers PHP_Token_Includes::getType
     */
    public function testGetIncludes()
    {
        $this->assertSame(
          ['test4.php_', 'test3.php_', 'test2.php_', 'test1.php_'],
          $this->ts->getIncludes()
        );
    }

    /**
     * @covers PHP_Token_Includes::getName
     * @covers PHP_Token_Includes::getType
     */
    public function testGetIncludesCategorized()
    {
        $this->assertSame(
          [
            'require_once' => ['test4.php_'],
            'require'      => ['test3.php_'],
            'include_once' => ['test2.php_'],
            'include'      => ['test1.php_']
          ],
          $this->ts->getIncludes(true)
        );
    }

    /**
     * @covers PHP_Token_Includes::getName
     * @covers PHP_Token_Includes::getType
     */
    public function testGetIncludesCategory()
    {
        $this->assertSame(
          ['test4.php_'],
          $this->ts->getIncludes(true, 'require_once')
        );
    }
}
