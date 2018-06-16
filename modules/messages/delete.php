<?php
/**
 * Created by PhpStorm.
 * User: Zhitkov
 * Date: 22.05.2018
 * Time: 12:14
 */
function my_autoloader($class) {
    require_once './../../classes/' . $class . '.php';
}
spl_autoload_register('my_autoloader');

$message = new Message($_POST['message_id']);
$message->delete();


header("Location: ".$_SERVER['HTTP_REFERER']);