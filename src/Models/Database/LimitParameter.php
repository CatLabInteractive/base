<?php

namespace CatLab\Base\Models\Database;

/**
 * Class LimitParameter
 * @package CatLab\Base\Models\Database
 */
class LimitParameter implements \CatLab\Base\Interfaces\Database\LimitParameter
{
    /**
     * @var int
     */
    private $amount;

    /**
     * @var int
     */
    private $offset;

    public function __construct($a, $b = null)
    {
        if (isset($b)) {
            $this->amount = $b;
            $this->offset = $a;
        } else {
            $this->amount = $a;
            $this->offset = 0;
        }
    }

    /**
     * @return int
     */
    public function getAmount()
    {
        return $this->amount;
    }

    /**
     * @return int
     */
    public function getOffset()
    {
        return $this->offset;
    }

    /**
     * @return string
     */
    public function __toString()
    {
        if ($this->offset) {
            return $this->offset . ', ' . $this->amount;
        } else {
            return $this->amount;
        }
    }
}