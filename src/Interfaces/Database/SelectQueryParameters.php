<?php

namespace CatLab\Base\Interfaces\Database;

/**
 * Interface SelectQueryParameters
 * @package CatLab\Base\Interfaces\Database
 */
interface SelectQueryParameters
{
    /**
     * @return JoinParameter[]
     */
    public function getJoins();

    /**
     * @return WhereParameter[]
     */
    public function getWhere();

    /**
     * @return OrderParameter[]
     */
    public function getSort();

    /**
     * @return LimitParameter
     */
    public function getLimit();

    /**
     * @return bool
     */
    public function isReverse();
}
