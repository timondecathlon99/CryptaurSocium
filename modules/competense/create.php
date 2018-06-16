<?php
/**
 * Created by PhpStorm.
 * User: Home
 * Date: 30.05.2018
 * Time: 23:02
 */
require_once ('../../global_pass.php');
function my_autoloader($class) {
    require_once './../../classes/' . $class . '.php';
}
spl_autoload_register('my_autoloader');

$competense = new Post(0);
$competense->getTable('competenses');
$competense->createUpdate();



header("Location: ".$domain.'competenses/');