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
    
    public function deleteComment(int $commentId){
        /** @var Comment $comment */
        $comment = CommentRepository::getOneById();
        
        $user = $comment->getUser();
        
        $user->deleteComment($comment->getId());
        
//        UserRepository::saveUser($user);
        CommentRepository::deleteById($commentId);
        
    }
}
