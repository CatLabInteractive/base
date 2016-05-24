<?php

namespace CatLab\Base\Helpers;

use Traversable;

/**
 * Class ArrayHelper
 * @package CatLab\Base\Helpers
 */
class ArrayHelper
{
    /**
     * @param $var
     * @return bool
     */
    public static function isIterable($var)
    {
        return (is_array($var) || $var instanceof Traversable);
    }
}