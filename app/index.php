<?php

require_once 'vendor/autoload.php';

$_GET['id']
$_GET['entity']

$userId = (int) $_GET['user_id'];

//$user = (new \Bionic\Repository\User())->getUserById($userId);




try {
    $user = (new \Bionic\Repository\User())->getUserById($userId);
} 
catch (InvalidArgumentException $e) {
    print ("User with ID $userId qas not found :) ");    
}
