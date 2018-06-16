<?php
/**
 * Created by PhpStorm.
 * User: Home
 * Date: 09.05.2018
 * Time: 21:41
 */
function my_autoloader($class) {
    require_once './../../classes/' . $class . '.php';
}
spl_autoload_register('my_autoloader');

$currComment = new Comment(0);
$currComment->create();

echo  $_POST['rating'];

header("Location: ".$_SERVER['HTTP_REFERER']);