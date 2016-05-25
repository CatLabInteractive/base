<?php

namespace CatLab\Base\Models\Database;

/**
 * Class OrderParameter
 * @package CatLab\Base\Models\Database
 */
class OrderParameter implements \CatLab\Base\Interfaces\Database\OrderParameter
{


    /**
     * @var string
     */
    private $column;

    /**
     * @var string
     */
    private $direction;

    /**
     * SortParameter constructor.
     * @param string $column
     * @param string $direction
     */
    public function __construct($column, $direction)
    {
        $this->column = $column;
        $this->direction = $direction;
    }

    /**
     * @return string
     */
    public function getColumn()
    {
        return $this->column;
    }

    /**
     * @return string
     */
    public function getDirection()
    {
        return $this->direction;
    }

    /**
     * @param $direction
     * @return string
     */
    public static function invertDirection($direction)
    {
        if ($direction === self::ASC) {
            return self::DESC;
        } else {
            return self::ASC;
        }
    }
}