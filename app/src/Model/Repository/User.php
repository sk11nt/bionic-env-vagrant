<?php

namespace Bionic\Model\Repository;

use Bionic\Model\User as UserModel;

class User extends AbstractRepository
{
    /**
     * @param int $id
     * @return User
     */
    public static function getOneById(int $id)
    {
        return new User($id, 'Ivan');
    }

    /**
     * @param int $id
     * @return UserModel
     * @throws \Doctrine\DBAL\DBALException
     * @throws \Exception
     */
    public static function getUserByCVId(int $id)
    {
//        if ($id < 1000) {
//            throw new \Exception("Id must be gte 1000");
//        }
//
//        return $this->get(['id' => $id], 1, 0);

        $stm = self::query("SELECT * FROM user WHERE cv_id = " . $id . " LIMIT 1;");
        $users = $stm->fetchAll();
        
        if (count($users) == 0) {
            throw new \Exception("User not found");
        }

        $userArray = $users[0];
        $user = new UserModel($userArray['id'], $userArray['name']);

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
            $users[$key] = new UserModel($userArray['id'], $userArray['name']);
        }
        return $users;
    }

    public function get($where = [], $limit = NULL, $offset = NULL, $sort = "ASC")
    {

    }

}
