<?php

namespace CatLab\Base\Models\Database;

use CatLab\Base\Models\Parameters\Raw;

/**
 * Class DB
 * @package CatLab\Base\Models\Database
 */
class DB implements \CatLab\Base\Interfaces\Database\DB
{
    /**
     * @param string $value
     * @return Raw
     */
    public static function raw($value)
    {
        return new Raw($value);
    }
}