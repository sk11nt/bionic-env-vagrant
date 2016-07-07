<?php
namespace Bionic\Controller;

//use Bionic\Model\Repository\User;

use Bionic\Model\Comment;
use Bionic\Model\Repository\User;

class MainController
{
    public function indexAction()
    {
        $comment = new Comment();
        
        
        $user = $comment->getUser()
//        $user = (new User())->getUserById($_GET['id']);
        return $user;
    }
}
