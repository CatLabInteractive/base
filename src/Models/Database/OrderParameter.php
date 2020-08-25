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
     * @var mixed
     */
    private $entity;

    /**
     * SortParameter constructor.
     * @param string $column
     * @param string $direction
     * @param null $entity
     */
    public function __construct($column, $direction, $entity = null)
    {
        $this->column = $column;
        $this->direction = $direction;
        $this->entity = $entity;
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

    /**
     * @return null|string
     */
    public function getEntity()
    {
        return $this->entity;
    }

    /**
     * @return string
     */
    public function __toString()
    {
        return $this->getColumn() . ' ' . $this->getDirection();
    }
}
