<?php

namespace Bionic\Model;


class User
{
    /**
     * @var int
     */
    private $id;

    /**
     * @var string
     */
    private $name;

    /**
    * @var Comment[]
     */
    private $comments = [];

    /**
     * @var User[]
     */
    private $users = [];

    
    
    
    /**
     * @return Comment[]
     */
    public function getComments()
    {
        return $this->comments;
    }

    /**
     * @param Comment[] $comments
     */
    public function setComments(array $comments)
    {
        $this->comments = $comments;

        return $this;
    }
    
    public function addComment(Comment $comment)
    {
        $this->comments[$comment->getId()] = $comment;
    }
    
    public function deleteComment(Comment $comment)
    {
        unset($this->comments[$comment->getId()]);
    }

    
    
    /**
     * @return CV|null
     */
    public function getCv()
    {
        return $this->cv;
    }

    /**
     * @param CV $cv
     */
    public function setCv(CV $cv)
    {
        $this->cv = $cv;
    }
    
    public function deleteCv()
    {
        $this->cv = null;
    }

    /**
     * @var null|CV
     */
    private $cv;

    /**
     * User constructor.
     * @param $id
     * @param $name
     */
    public function __construct(int $id, string $name, $age = null, $email = null)
    {
        $this->comments = [];
        $this->users = [];
        
        $this->id = $id;
        $this->name = $name;
    }


    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param int $id
     * @return $this
     */
    public function setId(int $id)
    {
        $this->id = $id;
        
        return $this;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return string
     */
    public function __toString()
    {
        return $this->getId() . ":" . $this->getName();
    }


}
