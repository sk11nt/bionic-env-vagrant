<?php

namespace Bionic\Model\Repository;

use Bionic\Model\Comment;
use Bionic\Model\CV;
use Bionic\Model\User as UserModel;

class User extends AbstractRepository
{
    private $db;
    /**
     * User constructor.
     */
    public function __construct()
    {
//        $this->db = new DataBaseService();
    }


    /**
     * @param int $id
     * @return UserModel
     */
    public static function getOneById(int $id)
    {
        $stm = $this->db->query("SELECT * FROM `users` u WHERE u.id = " . $id . "LIMIT 0,1;");
        $userArr = $stm->fetch();

        $user = new UserModel($userArr['user.id'], $userArr['user.name']);
//        if (!is_null($userArr['cvs.id'])) {
//            $cv = new CV($userArr['cv.id'], $user);
//            $user->setCv($cv);
//        }

//        $cv = $user->getCv()->getUser()->getCv()->getUser()->getCv();

        return $user;
    }

    /**
     * @param int $id
     *
     * @return UserModel
     */
    public function getOneByIdBetterThanPrevious(int $id)
    {
        $user = self::getOneById($id);

        /** @var CV $cv */
        $cv = CVRepository::getOneByUserId($user->getId());
        $user->setCv($cv);

        /** @var Comment[] $comments */
        $comments = CommentsRepository::getAllByUserId($user->getId());
        $user->setComments($comments);

        $users = static::getAllByUserId($user->getId());
        $user->setUsers($users);

        return $user;
    }

    /**
     * @param int $id
     *
     * @return UserModel[]
     */
    public static function getAllByUserId(int $id) : array
    {
        $stm = static::query("
          SELECT * 
          FROM `ref_users_users` ruu 
          LEFT JOIN `users` u 
          ON ruu.user_id_1 = u.id 
          WHERE ruu.user_id_2 = " . $id . ";");
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
