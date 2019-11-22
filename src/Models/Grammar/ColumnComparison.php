<?php


namespace CatLab\Base\Models\Grammar;

/**
 * Class ColumnComparison
 * @package CatLab\Base\Models\Grammar
 */
class ColumnComparison extends Comparison
{
    protected function getRight(callable $escapeMethod)
    {
        return $this->subjectToQuery($this->getValue());
    }
}
