<?php

namespace CatLab\Base\Models\Grammar;

/**
 * Class AndConjunction
 * @package CatLab\Base\Grammar
 */
class AndConjunction extends Conjunction implements \CatLab\Base\Interfaces\Grammar\AndConjunction
{
    /**
     * @return mixed
     */
    public function __toString()
    {
        return ' AND (' . $this->condition->__toString() . ')';
    }
}