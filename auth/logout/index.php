<?php
/**
 * Created by PhpStorm.
 * User: Zhitkov
 * Date: 24.05.2018
 * Time: 9:30
 */
include_once('../../global_pass.php');
include_once('../../classes/autoload.php');

$member = new Member($_COOKIE['member_id']);
$member->loginCheck(0, 0);

header("Location: ".$domain.'auth/');

