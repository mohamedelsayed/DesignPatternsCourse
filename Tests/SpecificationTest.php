<?php

namespace Tests;

use Behavioral\Specification\AgeSpecification;
use Behavioral\Specification\ANDSpecification;
use Behavioral\Specification\CV;
use Behavioral\Specification\LanguageSpecification;
use Behavioral\Specification\ORSpecification;
use Behavioral\Specification\SkillSpecifications;
use Behavioral\Specification\TechSpecifications;
use Behavioral\Specification\YearOfExPSpecification;
use PHPUnit\Framework\TestCase;

class SpecificationTest extends TestCase
{
    private function getSeniorBackendDevSpecification()
    {
        $yearOfEx = new YearOfExPSpecification(5);
        $ageSpec = new AgeSpecification(25, 30);
        $phpSpec = new LanguageSpecification('php');
        $javaSpec = new LanguageSpecification('java');
        $gitSpec = new TechSpecifications('git');
        $dockerSpec = new TechSpecifications('docker');
        $psSpec = new SkillSpecifications('problems-solving');
        $seniorSpecification = new ANDSpecification(
            $yearOfEx,
            $ageSpec,
            $phpSpec,
            $javaSpec,
            $gitSpec,
            $dockerSpec,
            $psSpec,
        );
        return $seniorSpecification;
    }

    private function getJuniorBackendDevSpecification()
    {
        $yearOfEx = new YearOfExPSpecification(2);
        $ageSpec = new AgeSpecification(20, 25);
        $phpSpec = new LanguageSpecification('php'); //OR
        $javaSpec = new LanguageSpecification('java');
        $gitSpec = new TechSpecifications('git');
        $juiorSpecification = new ANDSpecification(
            $yearOfEx,
            $ageSpec,
            new ORSpecification($phpSpec, $javaSpec),
            $gitSpec,
        );
        return $juiorSpecification;
    }

    public function testCanMatchCVWithSeniorSpecification()
    {
        $cv = new CV(6, ['problems-solving'], 30, ['git', 'docker', 'ci/cs'],  ['php', 'java', 'node']);
        $specification = $this->getSeniorBackendDevSpecification();
        $this->assertTrue($specification->isSatisfiedBy($cv));
    }

    public function testCanMatchCVWithJuniorSpecification()
    {
        $cv = new CV(3, ['problems-solving'], 24, ['git'],  ['java']);
        $specification = $this->getJuniorBackendDevSpecification();
        $this->assertTrue($specification->isSatisfiedBy($cv));
    }


    public function testCanNotMatchCVWithSeniorSpecificationIfAgeNotSaticified()
    {
        $cv = new CV(6, ['problems-solving'], 36, ['git', 'docker', 'ci/cs'],  ['php', 'java', 'node']);
        $specification = $this->getSeniorBackendDevSpecification();
        $this->assertFalse($specification->isSatisfiedBy($cv));
    }

    public function testCanNotMatchCVWithJuniorSpecificationIfNoLanguages()
    {
        $cv = new CV(3, ['problems-solving'], 24, ['git'],  ['node']);
        $specification = $this->getJuniorBackendDevSpecification();
        $this->assertFalse($specification->isSatisfiedBy($cv));
    }
}
