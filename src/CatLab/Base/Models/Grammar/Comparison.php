<?php

namespace CatLab\Base\Models\Grammar;

use CatLab\Base\Interfaces\Grammar\Comparison as ComparisonInterface;
use CatLab\Base\Interfaces\Grammar\Condition;
use PDO;

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
     * @var mixed
     */
    private $entity;

    /**
     * WhereParameter constructor.
     * @param $column
     * @param $operator
     * @param $value
     */
    public function __construct($column, $operator, $value, $entity = null)
    {
        $this->subject = $column;
        $this->operator = $operator;
        $this->value = $value;
        $this->entity = $entity;
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
     * @return mixed|null
     */
    public function getEntity()
    {
        return $this->entity;
    }

    /**
     * @param PDO $pdo
     * @return string
     */
    public function toQuery(PDO $pdo)
    {
        return $this->subjectToQuery() . ' ' . $this->operator . ' ' . $pdo->quote($this->getValue());
    }

    /**
     * @return string
     */
    public function __toString()
    {
        return $this->subjectToQuery() . ' ' . $this->operator . ' "' . escapeshellcmd($this->getValue()) . '"';
    }

    /**
     * Helper method to turn comparison into nice looking sql query.
     * @return string
     */
    protected function subjectToQuery()
    {
        $subject = '`' . $this->subject . '`';
        if ($this->entity) {
            $subject = '`' . $this->entity . '`.' . $this->subject;
        }

        return $subject;
    }
}