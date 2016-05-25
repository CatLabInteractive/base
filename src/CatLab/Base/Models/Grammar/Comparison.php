<?php

namespace CatLab\Base\Models\Grammar;

use CatLab\Base\Interfaces\Grammar\Comparison as ComparisonInterface;
use CatLab\Base\Interfaces\Grammar\Condition;

/**
 * Class Comparison
 * @package CatLab\Base\Models\Grammar
 */
class Comparison implements Condition, ComparisonInterface
{
    /**
     * @var string
     */
    private $subject;

    /**
     * @var string
     */
    private $operator;

    /**
     * @var string
     */
    private $value;

    /**
     * WhereParameter constructor.
     * @param $column
     * @param $operator
     * @param $value
     */
    public function __construct($column, $operator, $value)
    {
        $this->subject = $column;
        $this->operator = $operator;
        $this->value = $value;
    }

    /**
     * @return string
     */
    public function getSubject()
    {
        return $this->subject;
    }

    /**
     * @return string
     */
    public function getOperator()
    {
        return $this->operator;
    }

    /**
     * @return string
     */
    public function getValue()
    {
        return $this->value;
    }

    /**
     * @return string
     */
    public function __toString()
    {
        return $this->subject . ' ' . $this->operator . ' "' . escapeshellcmd($this->getValue()) . '"';
    }
}