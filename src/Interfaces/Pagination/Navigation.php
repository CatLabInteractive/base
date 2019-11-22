<?php

namespace CatLab\Base\Interfaces\Pagination;

/**
 * Class PaginationCursor
 * @package CatLab\Base\Interfaces\Pagination
 */
interface Navigation
{
    /**
     * @return mixed[]
     */
    public function toArray();

    /**
     * @return mixed[]
     */
    public function getNext();

    /**
     * @return mixed[]
     */
    public function getPrevious();
}