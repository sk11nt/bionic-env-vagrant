<?php

namespace Bionic\Model;


use \Bionic\Model\User;

class Comment
{
    /**
     * @var int
     */
    private $id;

    /**
     * @var User
     */
    private $user;

    /**
     * @var string
     */
    private $text;

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return string
     */
    public function getText()
    {
        return $this->text;
    }

    /**
     * @param string $text
     */
    public function setText($text)
    {
        $this->text = $text;
    }

    /**
     * @return \Bionic\Model\User
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * @param \Bionic\Model\User $user
     */
    public function setUser(User $user)
    {
        $this->user = $user;
    }
    
    
}
