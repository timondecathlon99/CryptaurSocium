<?php
/**
 * Created by PhpStorm.
 * User: Zhitkov
 * Date: 24.05.2018
 * Time: 10:07
 */
include_once('../../global_pass.php');
include_once('../../classes/autoload.php');


$member = new Member($_COOKIE['member_id']);
$member->loginCheck($_POST['login'], $_POST['pass']);

if($member->member_id() > 0){
    header("Location: ".$domain.'user/'.$member->member_id());
}else{
    header("Location: ".$_SERVER['HTTP_REFERER'].'/?wrong=1');
}
