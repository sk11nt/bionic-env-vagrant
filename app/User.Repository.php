<?php

namespace Bionic\Repository;



class User
{
    private static function getConnection()
    {
        $config = new \Doctrine\DBAL\Configuration();

        $connectionParams = array(
            'dbname' => 'mydb',
            'user' => 'user',
            'password' => 'secret',
            'host' => 'localhost',
            'driver' => 'pdo_mysql',
        );
        return \Doctrine\DBAL\DriverManager::getConnection($connectionParams, $config);
    }

    /**
     * @param int $id
     * @return \Bionic\Models\User
     * @throws \Doctrine\DBAL\DBALException
     */
    public function getUserById(int $id)
    {
        if ($id < 1000) {
            throw new \Exception("Id must be gte 1000");   
        }

        return $this->get(['id' => $id], 1, 0);
        
        $conn = self::getConnection();
        
        $stm = $conn->query("SELECT * FROM user WHERE id = " . $id . " LIMIT 1;");
        $users = $stm->fetchAll();
        
        if (count($users) == 0) {
            throw new \Exception("User not found");
        }

        $userArray = $users[0];
        $user = new \Bionic\Models\User($userArray['id'], $userArray['name']);

        return $user;
    }

    /**
     * @return array
     * @throws \Doctrine\DBAL\DBALException
     */
    public function getAll()
    {
        $conn = self::getConnection();

        $stm = $conn->query("SELECT * FROM user WHERE;");
        $users = $stm->fetchAll();

        foreach ($users as $key => $userArray) {
            $users[$key] = new \Bionic\Models\User($userArray['id'], $userArray['name']);
        }
        return $users;
    }

    public function get($where = [], $limit = NULL, $offset = NULL, $sort = "ASC")
    {

    }

}
