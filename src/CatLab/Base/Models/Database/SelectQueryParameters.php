<?php

namespace CatLab\Base\Models\Database;

use CatLab\Base\Interfaces\Database\SelectQueryParameters as SelectQueryParametersInterface;
use PDO;

/**
 * Class QueryParameters
 * @package CatLab\Base\Models\Database
 */
class SelectQueryParameters implements SelectQueryParametersInterface
{
    /**
     * @var WhereParameter[]
     */
    private $where;

    /**
     * @var OrderParameter[]
     */
    private $sort;

    /**
     * @var LimitParameter
     */
    private $limit;

    /**
     * @var bool
     */
    private $reverse = false;

    /**
     * SelectQueryParameters constructor.
     */
    public function __construct()
    {
        $this->where = array();
        $this->sort = array();
        $this->limit = null;
        $this->reverse = false;
    }

    /**
     * @param WhereParameter $where
     * @return $this
     */
    public function where(WhereParameter $where)
    {
        $this->where[] = $where;
        return $this;
    }

    /**
     * @param OrderParameter $sort
     * @return $this
     */
    public function orderBy(OrderParameter $sort)
    {
        $this->sort[] = $sort;
    }

    /**
     * @param LimitParameter $limit
     * @return $this
     */
    public function limit(LimitParameter $limit)
    {
        $this->limit = $limit;
        return $this;
    }

    /**
     * @param bool $reverse
     * @return $this
     */
    public function reverse($reverse = true)
    {
        $this->reverse = $reverse;
        return $this;
    }

    /**
     * @return WhereParameter[]
     */
    public function getWhere()
    {
        return $this->where;
    }

    /**
     * @return OrderParameter[]
     */
    public function getSort()
    {
        return $this->sort;
    }

    /**
     * @return LimitParameter
     */
    public function getLimit()
    {
        return $this->limit;
    }

    /**
     * @return bool
     */
    public function isReverse()
    {
        return $this->reverse;
    }

    /**
     * @param PDO $pdo
     * @param $table
     * @param array $columns
     * @return string
     */
    public function toQuery(PDO $pdo, $table, $columns = [])
    {
        if (count($columns) === 0) {
            $columns = [ '*' ];
        }

        $query = "SELECT " . implode($columns, ',') . " FROM " . $table;

        $where = '';
        foreach ($this->getWhere() as $v) {
            $where .= $v->toQuery($pdo) . ' AND ';
        }
        if (mb_strlen($where) > 0) {
            $where = mb_substr($where, 0, -5);
            $query .= ' WHERE ' . $where;
        }

        if (count($this->getSort()) > 0) {
            $query .= ' ORDER BY ';
            foreach ($this->getSort() as $v) {
                $query .= $v->__toString() . ', ';
            }
            $query = mb_substr($query, 0, -2);
        }

        if ($this->getLimit()) {
            $query .= ' LIMIT ' . $this->getLimit()->getAmount();
        }

        return $query;
    }
}