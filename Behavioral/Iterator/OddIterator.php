<?php

namespace Behavioral\Iterator;

use Iterator;

class OddIterator implements Iterator
{
    private EgyptCitiesCollection $citiesCollection;
    private int $index = 1;
    public function __construct(EgyptCitiesCollection $citiesCollection)
    {
        $this->citiesCollection = $citiesCollection;
    }

    public function current()
    {
        return $this->citiesCollection->getCities()[$this->index];
    }

    public function next()
    {
        $this->index = $this->nextOdd();
    }

    public function key()
    {
        return $this->index;
    }

    public function valid()
    {
        return isset($this->citiesCollection->getCities()[$this->index]);
    }

    public function rewind()
    {
        $this->index = 1;
    }

    private function nextOdd()
    {
        for ($item = 0, $itemMax = count($this->citiesCollection->getCities()); $item < $itemMax; $item++) {
            if (++$this->index % 2 === 1) {
                return $this->index;
                break;
            }
            return ++$this->index;
        }
    }
}
