<?php

use CatLab\Base\Helpers\StringHelper;

/**
 * Class StringHelperTest
 */
class StringHelperTest extends PHPUnit_Framework_TestCase
{
    /**
     *
     */
    public function testStartWith()
    {
        $this->assertTrue(StringHelper::startsWith('Dit is een test', 'Dit'));
        $this->assertFalse(StringHelper::startsWith('Neen, dit is fout.', 'Dit'));
        $this->assertFalse(StringHelper::startsWith('Dit is ook false', ''));
        $this->assertFalse(StringHelper::startsWith('', 'Dit ook.'));
    }

    /**
     *
     */
    public function testEndsWith()
    {
        $this->assertTrue(StringHelper::endsWith('Dit is een test', 'test'));
        $this->assertFalse(StringHelper::endsWith('Neen, dit is fout.', 'nope'));
        $this->assertFalse(StringHelper::endsWith('Dit is ook false', ''));
        $this->assertFalse(StringHelper::endsWith('', 'Dit ook.'));
    }
}