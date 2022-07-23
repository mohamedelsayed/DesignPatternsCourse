<?php

namespace Behavioral\Iterator;

use Iterator;

class AreaIterator implements Iterator
{

    private EgyptCitiesCollection $citiesCollection;
    
    private $sortedCities = [];

    private int $index = 0;

    public function __construct(EgyptCitiesCollection $citiesCollection)
    {
        $this->citiesCollection = $citiesCollection;
        $this->sortByArea();
    }

    public function current()
    {
        return $this->sortedCities[$this->index];
    }

    public function next()
    {
        $this->index += 1;
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
        $this->index = 0;
    }

    private function sortByArea()
    {
        $areas =[];
        $this->sortedCities= $this->citiesCollection->getCities();
        foreach ($this->citiesCollection->getCities() as $city) {
            $areas[] = $city->getArea();
        } 
        
        array_multisort($areas, SORT_DESC, $this->sortedCities);
        
    }


}
