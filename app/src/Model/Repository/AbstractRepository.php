<?php

namespace Bionic\Model\Repository;

use Doctrine\DBAL\DriverManager;

abstract class AbstractRepository
{
    public static function getConnection()
    {
        $connectionParams = array(
            'dbname' => 'bionic-tes',
            'user' => 'root',
            'password' => 'root',
            'host' => '127.0.0.1',
            'driver' => 'pdo_mysql',
        );
        return DriverManager::getConnection($connectionParams);
    }
    
    public static function query($sql_query)
    {
        $connection = static::getConnection();
        return $connection->query($sql_query);
    }
    
}
