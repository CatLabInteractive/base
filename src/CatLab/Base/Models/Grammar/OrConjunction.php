<?php

namespace CatLab\Base\Models\Grammar;

/**
 * Class OrConjunction
 * @package CatLab\Base\Grammar
 */
class OrConjunction extends Conjunction implements \CatLab\Base\Interfaces\Grammar\OrConjunction
{
    /**
     * @return mixed
     */
    public function __toString()
    {
        return ' OR (' . $this->condition->__toString() . ')';
    }
}