<?php

namespace CatLab\Base\Interfaces\Database;

/**
 * Interface LimitParameter
 * @package CatLab\Base\Interfaces\Database
 */
interface LimitParameter
{
    /**
     * @return int
     */
    public function getAmount();

    /**
     * @return int
     */
    public function getOffset();
}