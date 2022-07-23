<?php

namespace Behavioral\Iterator;

use IteratorAggregate;

class EgyptCitiesCollection implements IteratorAggregate
{
    private $cities = [];

    public function addCity(City $city)
    {
        $this->cities[] = $city;
        return $this;
    }

    public function removeCity(string $name)
    {
        foreach ($this->cities as $key => $city) {
            if ($city->getName() === $name) {
                unset($this->cities[$key]);
            }
        }
    }

    /**
     * Get the value of cities
     */ 
    public function getCities()
    {
        return $this->cities;
    }

    public function getIterator()
    {
        return new OddIterator($this);
    }
    
    public function getEvenIterator()
    {
        return new EvenIterator($this);
    }

    public function getAreaIterator(){
        return new AreaIterator($this);
    }
}