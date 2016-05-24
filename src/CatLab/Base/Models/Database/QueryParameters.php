<?php

namespace CatLab\Base\Models\Database;

/**
 * Class QueryParameters
 * @package CatLab\Base\Models\Database
 */
class QueryParameters
{
    /**
     * @var WhereParameter[]
     */
    private $where;

    /**
     * @var SortParameter[]
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
     * @param SortParameter $sort
     * @return $this
     */
    public function sort(SortParameter $sort)
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
     * @return SortParameter[]
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