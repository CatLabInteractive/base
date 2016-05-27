<?php

use CatLab\Base\Collections\Collection;
use CatLab\Base\Helpers\ArrayHelper;

class ArrayHelperTest extends PHPUnit_Framework_TestCase
{
    public function testReverseArray()
    {
        $array = [ 1, 2, 3 ];
        $reverse = ArrayHelper::reverse($array);

        $this->assertEquals([ 3, 2, 1 ], $reverse);
    }

    public function testReverseCollection()
    {
        $collection = new Collection();
        $collection[] = 1;
        $collection[] = 2;
        $collection[] = 3;

        $reverse = ArrayHelper::reverse($collection);

        $expected = new Collection();
        $expected[] = 3;
        $expected[] = 2;
        $expected[] = 1;

        $this->assertEquals($expected, $reverse);
    }
}