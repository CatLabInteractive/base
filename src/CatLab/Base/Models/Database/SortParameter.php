<?php

namespace CatLab\Base\Models\Database;

/**
 * Class SortParameter
 * @package CatLab\Base\Models\Database
 */
class SortParameter
{
    const ASC = 'ASC';
    const DESC = 'DESC';

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
}