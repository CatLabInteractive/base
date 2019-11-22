<?php

namespace CatLab\Base\Interfaces\Grammar;

/**
 * Interface Comparison
 * @package CatLab\Base\Interfaces\Grammar
 */
interface Comparison
{
    /**
     * @return string
     */
    public function getSubject();

    /**
     * @return string
     */
    public function getOperator();

    /**
     * @return string
     */
    public function getValue();

    /**
     * Return the entity class name if defined.
     * @return mixed
     */
    public function getEntity();
}