<?php
/**
 * Created by PhpStorm.
 * User: Home
 * Date: 30.05.2018
 * Time: 22:40
 */
require_once ('../../global_pass.php');
function my_autoloader($class) {
    require_once './../../classes/' . $class . '.php';
}
spl_autoload_register('my_autoloader');

$experience = new Post(0);
$experience->getTable('experience');
$experience->createUpdate();


header("Location: ".$domain.'competenses/');