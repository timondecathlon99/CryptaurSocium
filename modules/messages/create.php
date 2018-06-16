<?php
/**
 * Created by PhpStorm.
 * User: Zhitkov
 * Date: 22.05.2018
 * Time: 12:22
 */
function my_autoloader($class) {
    require_once './../../classes/' . $class . '.php';
}
spl_autoload_register('my_autoloader');


$message = new Message(0);
$message->create($_GET['description'], $_GET['room_id']);
echo 111;

header("Location: ".$_SERVER['HTTP_REFERER']);