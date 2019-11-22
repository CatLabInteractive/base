<?php

namespace CatLab\Base\Models\Database;

/**
 * Class JoinParameter
 * @package CatLab\Base\Models\Database
 */
class JoinParameter implements \CatLab\Base\Interfaces\Database\JoinParameter
{
    const TYPE_INNER = 'inner';
    const TYPE_LEFT = 'left';
    const TYPE_RIGHT = 'right';

    /**
     * @var string
     */
    protected $table;

    /**
     * @var WhereParameter[]
     */
    protected $where;

    /**
     * @var string
     */
    protected $type;

    /**
     * JoinParameter constructor.
     * @param $table
     * @param $first
     * @param $operator
     * @param $second
     * @param string $type
     */
    public function __construct(
        $table,
        $first = null,
        $operator = null,
        $second = null,
        $type = 'inner'
    ) {
        $this->where = array();

        $this->table = $table;

        if ($first && $operator && $second) {
            $this->on(new OnParameter($first, $operator, $second));
        }

        if ($first instanceof OnParameter) {
            $this->on($first);
        }

        $this->type = $type;
    }

    /**
     * @param OnParameter $where
     * @return $this
     */
    public function on(OnParameter $where)
    {
        $this->where[] = $where;
        return $this;
    }

    /**
     * @return array|WhereParameter[]
     */
    public function getOn()
    {
        return $this->where;
    }

    /**
     * @return string
     */
    public function getTable()
    {
        return $this->table;
    }

    /**
     * @return string
     */
    public function getSqlType()
    {
        switch ($this->type) {
            case self::TYPE_INNER:
                return 'INNER';
            case self::TYPE_LEFT:
                return 'LEFT';
            case self::TYPE_RIGHT:
                return 'RIGHT';
        }

        return '';
    }

    /**
     * @return string
     */
    public function __toString()
    {
        $query = ' ' . $this->getSqlType() . ' JOIN ' . $this->getTable();

        $on = '';
        foreach ($this->getOn() as $where) {
            $on .= $where->__toString() . ' AND ';
        }

        if (mb_strlen($on) > 0) {
            $on = mb_substr($on, 0, -5);
            $query .= ' ON ' . $on;
        }

        return $query;
    }
}
