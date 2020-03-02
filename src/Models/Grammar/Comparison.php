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
     * @var string|array
     */
    protected $subject;

    /**
     * @var string
     */
    protected $operator;

    /**
     * @var string
     */
    protected $value;

    /**
     * @var bool
     */
    protected $raw = false;

    /**
     * @var any
     */
    protected $entity;

    /**
     * WhereParameter constructor.
     * @param $column string|array
     * @param $operator
     * @param $value
     * @param $raw
     */
    public function __construct($column, $operator, $value, $raw = false, $entity = null)
    {
        $this->subject = $column;
        $this->operator = $operator;
        $this->value = $value;
        $this->raw = $raw;
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
        return $this->getLeft([ $pdo, 'quote' ]) . ' ' . $this->operator . ' ' . $this->getRight([ $pdo, 'quote' ]);
    }

    /**
     * Only used for debugging purposes.
     * @return string
     */
    public function __toString()
    {
        $escapeFunction = (function($v) {
            return '"' . escapeshellcmd($v) . '"';
        });

        return $this->getLeft($escapeFunction) . ' ' . $this->operator . ' '  . $this->getRight($escapeFunction);
    }

    /**
     * @param callable $escapeMethod
     * @return string
     */
    public function getEscapedValue(callable $escapeMethod)
    {
        if ($this->raw) {
            return $this->getValue();
        } else {
            return $escapeMethod($this->getValue());
        }
    }

    /**
     * @param callable $escapeMethod
     * @return string
     */
    protected function getLeft(callable $escapeMethod)
    {
        return $this->subjectToQuery($this->subject);
    }

    /**
     * @param callable $escapeMethod
     * @return string
     */
    protected function getRight(callable $escapeMethod)
    {
        return $this->getEscapedValue($escapeMethod);
    }

    /**
     * Helper method to turn comparison into nice looking sql query.
     * @return string
     */
    protected function subjectToQuery($subject)
    {
        if (!is_array($subject)) {
            return '`' . $subject . '`';
        } else {
            return '`' . $subject[0] . '`.`' . $subject[1] . '`';
        }
    }
}
