<?php


namespace SlightPDO;

use PDO;
use PDOException;

class Factory
{
    public static function create(Connection $connection): Wrapper
    {
        try {
            $pdo = new PDO($connection->getDsn(), $connection->config->getUsername(), $connection->config->getPassword());
        } catch (PDOException $exception) {
            die($exception->getMessage());
        }

        return new Wrapper($pdo);
    }
}