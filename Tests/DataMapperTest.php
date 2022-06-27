<?php

namespace Tests;

use PHPUnit\Framework\TestCase;
use Structural\DataMapper\DataMapper;
use Structural\DataMapper\StorageManager;
use Structural\DataMapper\User;

class DataMapperTest extends TestCase
{
    private StorageManager $manager;
    private array $data;
    protected function setUp(): void
    {
        $this->data = [1 => ['userName' => 'Admin', 'password' => '123']];
        $this->manager = new StorageManager($this->data);
    }
    public function testCanGetUserByID()
    {
        $dataMapper = new DataMapper($this->manager);
        $user = $dataMapper->findByID(1);
        $this->assertEquals($this->data[1], $user);
    }

    public function testCanSaveUserObject()
    {
        $dataMapper = new DataMapper($this->manager);
        $user = new User();
        $user->setId(2);
        $user->setUserName('Master');
        $user->setPassword('321');
        $this->assertTrue($dataMapper->saveUser($user));
        // $this->assertEquals($this->data[2], $user);
    }
}
