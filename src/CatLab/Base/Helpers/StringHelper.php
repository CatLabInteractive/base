<?php

namespace CatLab\Base\Helpers;

/**
 * Class StringHelper
 * @package CatLab\Base\Helpers;
 */
class StringHelper
{
    /**
     * @param $str
     * @param $start
     * @param null $length
     * @param null $encoding
     * @return string
     */
    public static function substr($str, $start, $length = null, $encoding = null)
    {
        if ($encoding === null) {
            $encoding = mb_internal_encoding();
        }

        return mb_substr($str, $start, $length, $encoding);
    }

    /**
     * @param $str
     * @param null $encoding
     * @return int
     */
    public static function length($str, $encoding = null)
    {
        if ($encoding === null) {
            $encoding = mb_internal_encoding();
        }

        return mb_strlen($str, $encoding);
    }

    /**
     * @param string $input
     * @return string
     */
    public static function escapeFileName($input)
    {
        return preg_replace('/[^A-Za-z0-9_\-]/', '_', $input);
    }

    /**
     * @param $input
     * @return string
     */
    public static function toLower($input)
    {
        return mb_strtolower($input);
    }

    /**
     * Return a (not very good) pluralized form of the input.
     * @param $input
     * @param int $amount
     * @return mixed|string
     */
    public static function plural($input, $amount = 2)
    {
        if (method_exists('Str', 'plural')) {
            return call_user_func([ 'Str', 'plural' ], $input, $amount);
        } else {
            return $input . 's';
        }
    }
}