<?php
/**
 * Created by PhpStorm.
 * User: Home
 * Date: 30.05.2018
 * Time: 22:36
 */
function my_autoloader($class) {
    require_once './../../classes/' . $class . '.php';
}
spl_autoload_register('my_autoloader');

$experience = new Post($_POST['experience_id']);
$experience->getTable('experience');
$experience->delete();

header("Location: ".$_SERVER['HTTP_REFERER']);