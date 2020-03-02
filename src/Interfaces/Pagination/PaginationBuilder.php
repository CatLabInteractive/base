<?php

namespace CatLab\Base\Interfaces\Pagination;

use CatLab\Base\Models\Database\OrderParameter;
use CatLab\Base\Models\Database\SelectQueryParameters;

/**
 * Class PaginationBuilder
 * @package CatLab\Base\Interfaces\Pagination
 */
interface PaginationBuilder
{
    /**
     * @param OrderParameter $order
     * @return $this
     */
    public function orderBy(OrderParameter $order);

    /**
     * @param string $column
     * @param string $publicName
     * @return $this
     */
    public function registerPropertyName(string $column, string $publicName, \closure $transformer = null);

    /**
     * @param int $records
     * @return $this
     */
    public function limit(int $records);

    /**
     * @param SelectQueryParameters $parameters
     * @return SelectQueryParameters
     */
    public function build(SelectQueryParameters $parameters = null);

    /**
     * @return Navigation
     */
    public function getNavigation() : Navigation;

    /**
     * @param array $properties
     * @return PaginationBuilder
     */
    public function setRequest(array $properties);

    /**
     * @return OrderParameter[]
     */
    public function getOrderBy();

    /**
     * Process results and return the resulting collection.
     * @param SelectQueryParameters $parameters
     * @param mixed[] $collection
     * @return mixed[]
     */
    public function processResults(SelectQueryParameters $parameters, $collection);

    /**
     * Process an already processed result set.
     * This should set any cursors / first / last values that the pagination builder needs.
     * @param $results
     * @return mixed
     */
    public function processCollection($results);

    /**
     * @param array $properties
     * @return PaginationBuilder
     */
    public function setFirst($properties) : PaginationBuilder;

    /**
     * @param array $properties
     * @return PaginationBuilder
     */
    public function setLast($properties) : PaginationBuilder;
}
