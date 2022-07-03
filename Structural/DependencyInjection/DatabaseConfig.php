<?php

namespace Structural\DependencyInjection;

class DatabaseConfig
{

    private string $host;
    private string $userName;
    private string $password;
    private string $port;
    private string $databaseName;

    public function __construct(string $host, string $userName, string $password, string $port, string $databaseName)
    {
        $this->host = $host;
        $this->userName = $userName;
        $this->password = $password;
        $this->port = $port;
        $this->databaseName = $databaseName;
    }

    /**
     * Get the value of host
     */
    public function getHost()
    {
        return $this->host;
    }

    /**
     * Get the value of userName
     */
    public function getUserName()
    {
        return $this->userName;
    }

    /**
     * Get the value of password
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * Get the value of port
     */
    public function getPort()
    {
        return $this->port;
    }

    /**
     * Get the value of databaseName
     */
    public function getDatabaseName()
    {
        return $this->databaseName;
    }
}
