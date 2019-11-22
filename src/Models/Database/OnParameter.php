<?php

namespace CatLab\Base\Models\Database;

use CatLab\Base\Enum\Operator;
use CatLab\Base\Interfaces\Database\WhereParameter as WhereParameterInterface;
use CatLab\Base\Models\Grammar\AndConjunction;
use CatLab\Base\Models\Grammar\ColumnComparison;
use CatLab\Base\Models\Grammar\Comparison;
use CatLab\Base\Models\Grammar\Conjunction;
use CatLab\Base\Models\Grammar\OrConjunction;
use PDO;

/**
 * Class WhereParameter
 * @package CatLab\Base\Models\Database
 */
class OnParameter implements WhereParameterInterface
{
    /**
     * @var Comparison
     */
    private $condition;

    /**
     * @var Conjunction[]
     */
    private $compositions;

    /**
     * WhereParameter constructor.
     * @param $column
     * @param $operator
     * @param $value
     * @param bool $raw
     */
    public function __construct(array $column = null, $operator = Operator::EQ, array $value = null)
    {
        $this->compositions = [];

        if ($column instanceof WhereParameterInterface) {
            $this->and($column);
        } elseif (isset($column) || isset($operator)) {
            $this->condition = new ColumnComparison($column, $operator, $value, true);
        }
    }

    /**
     * @param WhereParameterInterface $where
     * @return $this
     */
    public function and(WhereParameterInterface $where)
    {
        $this->compositions[] = new AndConjunction($where);
        return $this;
    }

    /**
     * @param WhereParameterInterface $where
     * @return $this
     */
    public function or(WhereParameterInterface $where)
    {
        $this->compositions[] = new OrConjunction($where);
        return $this;
    }

    /**
     * @return Conjunction[]
     */
    public function getChildren()
    {
        return $this->compositions;
    }

    /**
     * @return Comparison|null
     */
    public function getComparison()
    {
        return $this->condition;
    }

    /**
     * @param PDO $pdo
     * @return string
     */
    public function toQuery(PDO $pdo)
    {
        if ($this->condition) {
            $out = $this->condition->toQuery($pdo);
        } else {
            $out = 'TRUE';
        }

        foreach ($this->compositions as $v) {
            $out .= $v->toQuery($pdo);
        }

        return $out;
    }

    /**
     * @return string
     */
    public function __toString()
    {
        if ($this->condition) {
            $out = $this->condition->__toString();
        } else {
            $out = 'TRUE';
        }

        foreach ($this->compositions as $v) {
            $out .= $v->__toString();
        }

        return $out;
    }
}
