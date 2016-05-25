<?php

namespace CatLab\Base\Interfaces\Database;

/**
 * Interface OrderParameter
 * @package CatLab\Base\Interfaces\Database
 */
interface OrderParameter
{
    const ASC = 'ASC';
    const DESC = 'DESC';

    /**
     * @return string
     */
    public function getColumn();

    /**
     * @return string
     */
    public function getDirection();
}