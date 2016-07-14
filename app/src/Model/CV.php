<?php

namespace Bionic\Model;


class CV
{
    /**
     * @var
     */
    private $id;

    /**
     * @var User
     */
    private $user;

    /**
     * CV constructor.
     * @param $id
     * @param User $user
     */
    public function __construct($id, User $user)
    {
        $this->id = $id;
        $this->user = $user;
    }


    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return User
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * @param User $user
     */
    public function setUser($user)
    {
        $this->user = $user;
    }
    
    
}
