<?php
/**
 * Created by PhpStorm.
 * User: Zhitkov
 * Date: 05.06.2018
 * Time: 13:24
 */
require_once ('../../global_pass.php');
function my_autoloader($class) {
    require_once './../../classes/' . $class . '.php';
}
spl_autoload_register('my_autoloader');

$member = new Member($_COOKIE['member_id']);
if($_FILES['file']['name']){
    $member->changeAvatar($_POST['file']);
}

$user_perm_sql = $pdo->prepare("SELECT * FROM user_show_fields_permissions WHERE member_id=:member_id");
$user_perm_sql->bindParam(':member_id',$member->member_id());
$user_perm_sql->execute();
$user_perm_line = $user_perm_sql->fetch(PDO::FETCH_LAZY);

if($user_perm_sql->rowCount() > 0){
    $visibility = new Post($user_perm_line->id);
}else{
    $visibility = new Post(0);
}

$visibility->getTable('user_show_fields_permissions');
$visibility->createUpdate();

//var_dump($_POST);

header("Location: ".$_SERVER['HTTP_REFERER']);