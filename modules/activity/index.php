<?php
/**
 * Created by PhpStorm.
 * User: Zhitkov
 * Date: 08.05.2018
 * Time: 14:13
 */
include('../../global_pass.php');
require_once('../../classes/autoload.php');

$post = new Post($_GET['id']);
$post->getTable($_GET['category']);

if($post->isActive()){
    $post->deactivate();
}else{
    $post->activate();
}

header("Location: ".$_SERVER['HTTP_REFERER']);