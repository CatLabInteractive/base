<?php

namespace CatLab\Base\Helpers;

/**
 * Class ObjectHelper
 * @package CatLab\Base\Helpers;
 */
class ObjectHelper
{
    /**
     * Get the class "basename" of the given object / class.
     * Copyright (c) <Taylor Otwell>
     *
     * @param  string|object  $class
     * @return string
     */
    public static function class_basename($class)
    {
        $class = is_object($class) ? get_class($class) : $class;

        return basename(str_replace('\\', '/', $class));
    }
}