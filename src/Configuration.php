<?php

namespace SlightPDO;

class Configuration
{
    private $host;
    private $port;
    private $username;
    private $password;
    private $driver;
    private $dbname;

    /**
     * @param string $host
     * @param int $port
     * @param string $username
     * @param string $password
     * @param string $dbname
     * @param string|null $driver
     */
    public function __construct(string $host, int $port, string $dbname, string $username, string $password, ?string $driver = "mysql")
    {
        $this->host = $host;
        $this->port = $port;
        $this->dbname = $dbname;
        $this->username = $username;
        $this->password = $password;
        $this->driver = $driver;
    }

    public function getDriver(): string
    {
        return $this->driver;
    }

    public function getHost(): string
    {
        return $this->host;
    }

    public function getPort(): int
    {
        return $this->port;
    }

    public function getDbname(): string
    {
        return $this->dbname;
    }

    public function getUsername(): string
    {
        return $this->username;
    }

    public function getPassword(): string
    {
        return $this->password;
    }
}