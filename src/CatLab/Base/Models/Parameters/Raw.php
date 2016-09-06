<?php

namespace CatLab\Base\Models\Parameters;

/**
 * Class Raw
 * @package CatLab\Base\Models\Parameters
 */
class Raw implements \CatLab\Base\Interfaces\Parameters\Raw
{
    private $value;

    /**
     * Raw constructor.
     * @param $value
     */
    public function __construct($value)
    {
        $this->value = $value;
    }

    /**
     * @return string
     */
    public function __toString()
    {
        return $this->value;
    }
}