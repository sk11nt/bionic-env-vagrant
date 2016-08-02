<?php

namespace Bionic\Controller;


class AdminController extends AbstractController
{
    public function loginAction()
    {
        $user = [];
        $user['login'] = $_GET['login'];
        $user['password'] = $_GET['password'];

        if ($user['login'] == 'dima' && $user['password'] == 'pass') {
            $_SESSION['user']['id'] = 1;
            $_SESSION['user']['type'] = 'USER_ADMIN';
            echo "OK";
            die;
        }

        echo "Wrong user"; die;
    }

    public function logoutAction()
    {
        unset($_SESSION['user']);

        echo 'Logged out!'; die;
    }

    public function indexAction()
    {
        if (isset($_SESSION['user'])
            && isset($_SESSION['user']['id'])
            && !is_null($_SESSION['user']['id'])) {

            $user = $_SESSION['user'];
            echo $user['id'];
        }
        else {
            $this->loginAction();
        }
    }

    public function deletePostAction($postId)
    {
        $post = PostRepository::getOneById($postId);


        if ($_SESSION['user']['type'] !== 'USER_ADMIN'
            || $_SESSION['user']['type'] !== 'USER_LOGGEDIN'
            || $post->getUser()->getId() !== $_SESSION['user']['id']
        ) {
            echo "No permissions!"; die;
        }
    }
}
