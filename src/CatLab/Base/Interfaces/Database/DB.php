<?php

namespace CatLab\Base\Interfaces\Database;
use CatLab\Base\Interfaces\Parameters\Raw;

/**
 * Interface DB
 * @package CatLab\Base\Interfaces\Database
 */
interface DB
{
    /**
     * @param string $value
     * @return Raw
     */
    public static function raw($value);
}