<?php

namespace CatLab\Base\Interfaces\Pagination;

use CatLab\Base\Models\Database\QueryParameters;

/**
 * Class PaginationBuilder
 * @package CatLab\Base\Interfaces\Pagination
 */
interface PaginationBuilder
{
    /**
     * @return $this
     */
    public function clear();

    /**
     * @param string $column
     * @param string $direction
     * @return $this
     */
    public function sort(string $column, string $direction = 'asc');

    /**
     * @param int $records
     * @return $this
     */
    public function limit(int $records);

    /**
     * @param QueryParameters $parameters
     * @return QueryParameters
     */
    public function build(QueryParameters $parameters = null);

    /**
     * To be called after the query has been handled.
     * @param array $results
     * @return mixed
     */
    public function processResults(array $results);
}