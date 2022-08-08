<?php

namespace Tests;

use Behavioral\Visitor\Bali;
use Behavioral\Visitor\Cairo;
use Behavioral\Visitor\Covid19Traveler;
use Behavioral\Visitor\London;
use Behavioral\Visitor\Sydney;
use Behavioral\Visitor\Traveler;
use PHPUnit\Framework\TestCase;

class VisitorTest extends TestCase
{
    private array $tripPlan = [];

    protected function setUp(): void
    {
        $this->tripPlan[] = new Cairo();
        $this->tripPlan[] = new Sydney();
        $this->tripPlan[] = new London();
        $this->tripPlan[] = new Bali();
    }

    public function testCanEgPassportTravelSomeCities()
    {
        $traveler = new Traveler('EG', true, 500);
        foreach ($this->tripPlan as $city) {
            $city->accept($traveler);
        }
        $this->assertEquals(['Cairo', 'Bali'], $traveler->getTripHistory());
    }

    public function testCanUkPassportTravelAllCities()
    {
        $traveler = new Traveler('UK', true, 6000);
        foreach ($this->tripPlan as $city) {
            $city->accept($traveler);
        }
        $this->assertEquals(['Cairo', 'Sydney', 'London', 'Bali'], $traveler->getTripHistory());
    }

    public function testCanEGPassportTravelSomeCitiesAfterCovid()
    {
        $traveler = new Traveler('EG', true, 500);
        $covidTraveler = new Covid19Traveler($traveler, true, false);
        foreach ($this->tripPlan as $city) {
            $city->accept($covidTraveler);
        }
        $this->assertEquals(['Cairo'], $covidTraveler->getTraveler()->getTripHistory());
    }

    public function testCanUkPassportTravelAllCitiesAfterCovid()
    {
        $traveler = new Traveler('UK', true, 6000);
        $covidTraveler = new Covid19Traveler($traveler, true, true);

        foreach ($this->tripPlan as $city) {
            $city->accept($covidTraveler);
        }
        $this->assertEquals(['Cairo', 'Sydney', 'London', 'Bali'], $covidTraveler->getTraveler()->getTripHistory());
    }
}
