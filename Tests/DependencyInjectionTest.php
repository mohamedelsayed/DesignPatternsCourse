<?php

namespace Tests;

use PHPUnit\Framework\TestCase;
use Structural\DependencyInjection\DatabaseConfig;
use Structural\DependencyInjection\DatabaseConnection;

class DependencyInjectionTest extends TestCase
{
    public function testCanGetDatabaseStringURLFromDaabaseConnection()
    {
        $config = new DatabaseConfig('localhost', 'root', 'root', '3306', 'admin');
        $connection = new DatabaseConnection($config);
        $this->assertEquals('mysql://root:root@localhost:3306/admin', $connection->getConnectionString());
    }
}
