<?php
/**
 * Created by PhpStorm.
 * User: Zhitkov
 * Date: 30.05.2018
 * Time: 17:07
 */
function my_autoloader($class) {
    require_once './../../classes/' . $class . '.php';
}
spl_autoload_register('my_autoloader');

$experience = new Post(0);
$experience->getTable('experience');
$experience->createUpdate();


header("Location: ".$domain.'competenses/');