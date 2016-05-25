<?php

namespace CatLab\Base\Interfaces\Pagination;

/**
 * Class PaginationCursor
 * @package CatLab\Base\Interfaces\Pagination
 */
interface PaginationCursor
{
    /**
     * @return mixed
     */
    public function toArray();
}