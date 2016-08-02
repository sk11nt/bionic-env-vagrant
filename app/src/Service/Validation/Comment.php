<?php
namespace Bionic\Service\Validation;

use Bionic\Model\User;

class Comment implements ValidatorInterface
{
    public static function validate(\Bionic\Model\Comment $comment)
    {
        $errors = [];
        if (empty($comment->getText())) {
            $errors['text'] = 'Text cannot be empty';
        }

        if (!$comment->getUser() instanceof User) {
            $errors['user'] = "User must be an instance of User object";
        }

        if (empty($comment->getPost())) {
//            return false;
        }

        return $errors;
    }
}
