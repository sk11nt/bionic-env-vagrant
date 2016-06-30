<?php
//declare(strict_types=1);

//$time1 = microtime(true);

require_once 'class.simple.php';

var_dump(Simple::$staticProp);

Simple::$staticProp = 10;

//var_dump(Simple::getStaticProp());
//
//$simple = new Simple();
//
//var_dump(Simple::$staticProp);
//
//Simple::$staticProp = 50;
//
//var_dump($simple::$staticProp);



//$simpleClass = new Simple();
//
//$simpleClass->setProp('123123');
//$simpleClass->getProp();
//
//
//$time2 = microtime(true);
//var_dump($time2 - $time1);
//die;
