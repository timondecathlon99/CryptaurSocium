<?php
/**
 * Created by PhpStorm.
 * User: Zhitkov
 * Date: 22.05.2018
 * Time: 13:16
 */
function my_autoloader($class) {
    require_once './../../classes/' . $class . '.php';
}
spl_autoload_register('my_autoloader');

$message = new Message(0);
$message->deleteDialog($_POST['room_id']);

header("Location: ".$_SERVER['HTTP_REFERER']);