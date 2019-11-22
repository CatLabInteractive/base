<?php

namespace CatLab\Base\Models\Grammar;
use CatLab\Base\Interfaces\Grammar\Condition;

/**
 * Class Conjunction
 */
abstract class Conjunction
{
    /**
     * @var Condition
     */
    protected $condition;

    /**
     * Conjunction constructor.
     * @param Condition $condition
     */
    public function __construct(Condition $condition)
    {
        $this->condition = $condition;
    }

    /**
     * @return Condition
     */
    public function getSubject()
    {
        return $this->condition;
    }

    /**
     * @return mixed
     */
    abstract public function __toString();
}