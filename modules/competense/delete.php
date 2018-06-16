<?php
/**
 * Created by PhpStorm.
 * User: Home
 * Date: 30.05.2018
 * Time: 23:02
 */
function my_autoloader($class) {
    require_once './../../classes/' . $class . '.php';
}
spl_autoload_register('my_autoloader');

$competense = new Post($_POST['competense_id']);
$competense->getTable('competenses');
$competense->delete();


header("Location: ".$_SERVER['HTTP_REFERER']);