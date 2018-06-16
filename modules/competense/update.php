<?php
/**
 * Created by PhpStorm.
 * User: Zhitkov
 * Date: 07.06.2018
 * Time: 16:21
 */
require_once ('../../global_pass.php');
function my_autoloader($class) {
    require_once './../../classes/' . $class . '.php';
}
spl_autoload_register('my_autoloader');

var_dump($_POST);

$competense = new Post($_POST['competense_id']);
$competense->getTable('competenses');
$competense->createUpdate();

header("Location: ".$_SERVER['HTTP_REFERER']);