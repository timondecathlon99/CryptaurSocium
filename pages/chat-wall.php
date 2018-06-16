<?php
/**
 * Created by PhpStorm.
 * User: Zhitkov
 * Date: 06.06.2018
 * Time: 16:38
 */
?>
<div class="ghost flex-box flex-around">
	<div>
		Начало диалога
	</div>
</div>

<?



function my_autoloader($class) {
    require '../classes/' . $class . '.php';
}
spl_autoload_register('my_autoloader');
require_once ('../global_pass.php');

//echo $_GET['user_id'];
//echo $_GET['room_id'];

$partner = new Member($_GET['room_id']);
$logedUser = new Member($_GET['user_id']);

//echo $logedUser->member_id();

$messages = new Message(NULL);
$messages->markChatAsRead($_GET['room_id']);
foreach($messages->getChatMessages($logedUser->member_id(), $partner->member_id()) as $message){
    $listMessage = new Message($message['id']);
    $author = new Member($listMessage->author())?>
    <div class="message flex-box">
        <div class="message-info">
            <div class="flex-box">
                <div class="message-author-photo ">
                    <img  src='<?=$author->avatar()?>'/>
                </div>
                <div class="message-stats">
                    <div class="">
                        <?=$author->surName()?> <?=$author->name()?>
                    </div>
                    <div class="message-stats ghost">
                        <?=$listMessage->publ_time()?>
                    </div>
                </div>
            </div>
            <div class="message-body">
                <?=$listMessage->text()?>
            </div>
        </div>
        <div class="record-author right">
            <?if($listMessage->author() == $logedUser->member_id() || $logedUser->isAdmin()){?>
                <div class="delete_post">
                    <form action="<?=$domain?>modules/messages/delete.php" method="POST">
                        <input type="hidden" name="message_id" value="<?=$listMessage->messageId()?>"/>
                        <!--<button disabled class="btn-free ghost" title="Удалить сообщение"><i class="fas fa-times"></i> </button>-->
                        <div  class="btn-free ghost" title="Удалить сообщение"><i class="fas fa-times"></i></div>
                    </form>
                </div>
            <?}?>
        </div>
    </div>
<?}?>


