<?php

namespace CatLab\Base\Collections;

use Iterator;

/**
 * Class CollectionIterator
 * @package CatLab\RESTResource\Collections
 * @internal
 */
class CollectionIterator implements Iterator
{
    private $position = 0;

    /**
     * @var Collection
     */
    private $collection;

    /**
     * CollectionIterator constructor.
     * @param Collection $collection
     */
    public function __construct(Collection $collection)
    {
        $this->position = 0;
        $this->collection = $collection;

    }

    /**
     *
     */
    function rewind()
    {
        $this->position = 0;
    }

    /**
     * @return mixed
     */
    function current()
    {
        return $this->collection[$this->position];
    }

    /**
     * @return int
     */
    function key()
    {
        return $this->position;
    }

    /**
     *
     */
    function next()
    {
        ++$this->position;
    }

    /**
     * @return bool
     */
    function valid()
    {
        return isset($this->collection[$this->position]);
    }
}