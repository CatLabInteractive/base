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
     * @var string
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
     * @return string|null
     */
    public function getEntity()
    {
        return $this->entity;
    }
}