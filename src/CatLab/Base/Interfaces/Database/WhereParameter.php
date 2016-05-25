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
    /**
     * @return Comparison|null
     */
    public function getComparison();

    /**
     * @return WhereParameter[]
     */
    public function getChildren();
}