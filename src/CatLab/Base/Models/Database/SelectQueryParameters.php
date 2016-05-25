<?php

namespace CatLab\Base\Models\Database;

use CatLab\Base\Interfaces\Database\SelectQueryParameters as SelectQueryParametersInterface;

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
}