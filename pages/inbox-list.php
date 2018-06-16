<?php
/**
 * Created by PhpStorm.
 * User: Home
 * Date: 06.06.2018
 * Time: 22:42
 */
?>
<?
//echo time();
function my_autoloader1($class) {
    require_once '../classes/' . $class . '.php';
}
spl_autoload_register('my_autoloader1');
$logedUser = new Member($_COOKIE['member_id']);


$messages = new Message(NULL);
foreach($messages->getMemberDialogs() as $message){
    $listMessage = new Message($message['id']);
    if($listMessage->author() == $logedUser->member_id()){
        $author = new Member($listMessage->showField('to_id'));
        $test = '<span class="ghost">Вы: </span>';
    }else{
        $author = new Member($listMessage->author());
        $test = '';
    }
    ?>
    <div class="user-unit">
        <div class="user-name-block flex-box ">
            <div>
                <a href="<?=$domain?>user/<?=$author->member_id()?>/">
                    <span><b><?=$author->name()?> </b></span><?=$author->surName()?> <?=$author->fatherName()?>
                </a>
            </div>
            <div class="record-author flex-box right ">
                <div class="message-stats">
                    <div class="message-time ghost">
                        <?=$listMessage->publ_time()?>
                    </div>
                </div>
                <div class="delete_post">
                    <form action="<?=$domain?>modules/messages/delete_dialog.php" method="POST">
                        <input type="hidden" name="room_id" value="<?=$author->member_id()?>"/>
                        <!--<button disabled class="btn-free ghost" title="Удалить диалог"><i class="fas fa-times"></i></button>-->
                        <div  class="btn-free ghost" title="Удалить диалог"><i class="fas fa-times"></i></div>
                    </form>
                </div>
            </div>
        </div>
        <div class="flex-box flex-vertical-center">
            <div class="user-photo">
                <a href="<?=$domain?>user/<?=$author->member_id()?>/">
                    <img style='width: 100px;' src='<?=$author->avatar()?>'/>
                </a>
            </div>
            <div class="user-stats">
                <div class="message-status">
                    <?if($listMessage->isUnread()){?>
                        <span class="ghost">&#160;Непрочитано</span>
                    <?}?>
                </div>
                <div class="message-text">
                    <div>
                        <a href="<?=$domain?>chat/<?=$logedUser->member_id()?>/?room_id=<?=$author->member_id()?>">
                            <?=$test.$listMessage->text()?>
                        </a>
                    </div>

                </div>
            </div>
        </div>
    </div>
<?}?>
