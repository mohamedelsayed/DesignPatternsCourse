<?php

namespace Tests;

use Others\Repository\ArrayEntityManager;
use Others\Repository\PersistenceInterface;
use Others\Repository\User;
use Others\Repository\UserDataMapper;
use Others\Repository\UserRepository;
use PHPUnit\Framework\TestCase;

class RepositoryTest extends TestCase
{

    private PersistenceInterface $persistence;
    private UserRepository $repository;

    protected function setUp(): void
    {
        $dataSource = [
            1 => ['name' => 'ahmed', 'email' => 'ahmed@test.com', 'password' => '123'],
            2 => ['name' => 'mohamed', 'email' => 'mohamed@test.com', 'password' => '456'],
            3 => ['name' => 'ali', 'email' => 'ali@test.com', 'password' => '789'],
        ];
        $this->persistence = new ArrayEntityManager($dataSource);
        $this->repository = new UserRepository($this->persistence, new UserDataMapper());
    }

    public function testCanFindUserById()
    {
        $user = $this->repository->find(1);
        $this->assertInstanceOf(User::class, $user);
        $this->assertEquals('ahmed', $user->getName());
        $this->assertEquals('123', $user->getPassword());
        $this->assertEquals('ahmed@test.com', $user->getEmail());
    }

    public function testCanSaveUser()
    {
        $user = new User();
        $user->setName('test02');
        $user->setPassword('000');
        $user->setEmail('test02@test.com');
        $this->repository->save($user);
        $this->assertTrue($this->repository->save($user));
        $user = $this->repository->find(4);
        $this->assertInstanceOf(User::class, $user);
        $this->assertEquals('test02', $user->getName());
        $this->assertEquals('test02', $user->getEmail());

    }
}
