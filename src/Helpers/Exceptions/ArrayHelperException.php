<?php

namespace CatLab\Base\Helpers\Exceptions;

/**
 * Class ArrayHelperException
 * @package CatLab\Base\Helpers\Exceptions
 */
class ArrayHelperException extends \Exception
{
    /**
     * @param $class
     * @param $method
     * @return ArrayHelperException
     */
    public static function makeNotTraversable($class, $method)
    {
        return new self($class  . '::' . $method . ' requires array to be traversable.');
    }

    /**
     * @param $class
     * @param $method
     * @return ArrayHelperException
     */
    public static function makeNoArrayAccess($class, $method)
    {
        return new self($class  . '::' . $method . ' requires array to have ArrayAccess.');
    }
}