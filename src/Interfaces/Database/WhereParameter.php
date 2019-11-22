<?php

namespace CatLab\Base\Interfaces\Database;

use CatLab\Base\Interfaces\Grammar\Condition;
use CatLab\Base\Models\Grammar\Comparison;

/**
 * Interface WhereParameter
 * @package CatLab\Base\Interfaces\Database
 */
interface WhereParameter extends Condition
{
    const TYPE_BASIC = 'basic';     // compare column to literal value
    const TYPE_NULL = 'null';       // column must be null
    const TYPE_COLUMNS = 'columns'; // compare column to another column

    /**
     * @return Comparison|null
     */
    public function getComparison();

    /**
     * @return WhereParameter[]
     */
    public function getChildren();
}
