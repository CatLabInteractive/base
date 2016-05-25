<?php

namespace CatLab\Base\Models\Grammar;

use PDO;

/**
 * Class AndConjunction
 * @package CatLab\Base\Grammar
 */
class AndConjunction extends Conjunction implements \CatLab\Base\Interfaces\Grammar\AndConjunction
{
    /**
     * @param PDO $pdo
     * @return string
     */
    public function toQuery(PDO $pdo)
    {
        return ' OR (' . $this->condition->toQuery($pdo) . ')';
    }

    /**
     * @return mixed
     */
    public function __toString()
    {
        return ' AND (' . $this->condition->__toString() . ')';
    }
}