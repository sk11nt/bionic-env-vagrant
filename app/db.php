<?php
$dsn = 'mysql:host=localhost';
$username = 'username';
$password = 'password';
$options = array(
    PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
);

$dbh = new PDO($dsn, $username, $password, $options);

$stm = $dbh->query("SELECT * FROM user;");
$users = $stm->fetchAll(PDO::FETCH_CLASS, '\Bionic\Models\User');
