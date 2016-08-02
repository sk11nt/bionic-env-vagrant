<?php
namespace Bionic\Controller;

use Bionic\Model\Comment;
use Bionic\Model\User;

class MainController extends AbstractController
{

    /**
     * @return string
     */
    public function indexAction()
    {

        $comments = [
            'a' => (new Comment())->setId(1)->setText('aaa'),
            'b' => (new Comment())->setId(2)->setText('bbb'),
            'c' => (new Comment())->setId(3)->setText('ccc'),
        ];

        $user = new User(1, 'Fedor');
        $user->setComments($comments);


//        $_SESSION['user'] = $user;


        var_dump($_SESSION['user']); die;


        return $this->templater->render(
            'comment.twig',
            [
                'user' => $user
            ]
        );
//        var_dump(get_class($this->templater)); die;
//        $user = User::getOneById($_POST['comment_user']);
//
//        $comment = new Comment();
//        $comment->setText($_POST['comment_text']);
//        $comment->setUser($user);
//
//        $errors = \Bionic\Service\Validation\Comment::validate($comment);
//
//        if (count($errors) === 0) {
//            CommentRepository::saveCOmment($comment);
//        }
//
//
//        return TemplateBlala(
//            'templateName',
//            [
//                'comment' => $comment,
//                'errors' => $errors,
//            ]
//        );

    }
}
