<?php

namespace CatLab\Base\Models\Grammar;

use PDO;

/**
 * Class OrConjunction
 * @package CatLab\Base\Grammar
 */
class OrConjunction extends Conjunction implements \CatLab\Base\Interfaces\Grammar\OrConjunction
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
        return ' OR (' . $this->condition->__toString() . ')';
    }
}