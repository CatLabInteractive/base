<?php

namespace CatLab\Base\Helpers;

use ArrayAccess;
use CatLab\Base\Helpers\Exceptions\ArrayHelperException;
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

    /**
     * @param $var
     * @return bool
     */
    public static function hasArrayAccess($var)
    {
        return (is_array($var) || $var instanceof ArrayAccess);
    }

    /**
     * @param mixed[] $var
     * @return mixed[]
     * @throws ArrayHelperException
     */
    public static function reverse($var)
    {
        if (!self::isIterable($var)) {
            throw ArrayHelperException::makeNotTraversable(__CLASS__, 'reverse');
        }

        if (!self::hasArrayAccess($var)) {
            throw ArrayHelperException::makeNoArrayAccess(__CLASS__, 'reverse');
        }

        if (is_array($var)) {
            return array_reverse($var);
        } else {
            $clone = clone $var;
            self::clear($clone);

            $items = [];
            foreach ($var as $k => $v) {
                $items[$k] = $v;
            }
            $items = array_reverse($items);
            foreach ($items as $k => $v) {
                $clone[] = $v;
            }

            return $clone;
        }
    }

    /**
     * @param $var
     * @throws ArrayHelperException
     */
    public static function clear($var)
    {
        if (!self::isIterable($var)) {
            throw ArrayHelperException::makeNotTraversable(__CLASS__, 'reverse');
        }

        if (!self::hasArrayAccess($var)) {
            throw ArrayHelperException::makeNoArrayAccess(__CLASS__, 'reverse');
        }

        foreach ($var as $k => $v) {
            unset($var[$k]);
        }
    }
}