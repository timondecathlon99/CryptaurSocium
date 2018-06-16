<?php
/**
 * Created by PhpStorm.
 * User: Zhitkov
 * Date: 06.06.2018
 * Time: 13:37
 */
?>
<div >
    <div class="search-block">
        <form action='<?=$actual_link?>?sort=<?=$_GET['sort']?>' method='GET' class="flex-box ">
            <input placeholder="Поиск компетенций" type='text' name='search_line' value='<?=$_GET['search_line']?>'/>
            <input placeholder="Поиск компетенций" type='hidden' name='sort' value='<?=$_GET['sort']?>'/>
            <button class="btn-arrow btn-blue">Найти</button>
        </form>
    </div>

</div>
<div class="flex-box flex-left">
    <div class="box">
        <a class="btn-arrow btn-blue box" href="<?=$dimain?>/admin-competenses/?sort=new">
            Непроверенные
        </a>
    </div>
    <div class="box">
        <a class="btn-arrow btn-blue" href="<?=$dimain?>/admin-competenses/?sort=seen">
            Проверенные
        </a>
    </div>
</div>
<?($_GET['sort'] == 'new')? $option = '=' : $option = '!='  ;?>
<div class="competense_table">
    <?php
    $i = 1;
	$search_line = $_GET['search_line'];
	if($_GET['search_line'] != NULL){
		$users_line = '0';
		$users_sql = $pdo->prepare("SELECT * FROM users WHERE  title LIKE '%$search_line%' OR surname LIKE '%$search_line%' OR fathername LIKE '%$search_line%'");
		$users_sql->execute();
		while($users = $users_sql->fetch(PDO::FETCH_LAZY)){
			$users_line = $users_line.','.$users->id;			
		}
		$user_fil = "OR author IN($users_line)";
	}
		
    $sql = $pdo->prepare("SELECT * FROM competenses WHERE activity$option'1' AND (title LIKE '%$search_line%' OR description LIKE '%$search_line%' OR comment LIKE '%$search_line%'  $user_fil)   ORDER BY publ_time DESC");
    $sql->execute();
    if( $sql->rowCount() > 0){?>
        <table class="main_table">
            <tr>
                <th>П/П</th>
                <th>Пользователь</th>
                <th>Компетенция</th>
                <th>Направление</th>
                <th>Статус</th>
                <th>Время</th>
                <th>Коммментарий</th>
                <th>Коммментарий администратора</th>

            </tr>
            <?
            while($comp = $sql->fetch(PDO::FETCH_LAZY)){
                $user = new Member($comp->author);
                $compItem = new Post($comp->activity);
                $compItem->getTable('competense_status');
                $cat = new Post($comp->category);
                $cat->getTable('categories');?>
                <tr>

                        <td><?=$i?></td>
                        <td><a href="<?=$domain?>user/<?=$user->member_id()?>/"><?=$user->name()?></a></td>
                        <td><a class="underlined" href="<?=$domain.$comp->photo_small?>" target="_blank" ><?=$comp->title?></a></td>
                        <td><?=$cat->title()?></td>
                        <td><?=$compItem->title()?></td>
                        <td><?=date('d-m-y H:m',$comp->publ_time)?></td>
                        <td><?=$comp->description?></td>
                        <td>
                            <form class="flex-box" action="<?=$domain?>modules/competense/update.php" method="POST">
                            <textarea class="box" name="comment" type="text" value=""><?=$comp->comment?></textarea>

                                <input type="hidden" name="competense_id" value="<?=$comp->id?>"/>
                                <!--<button title="Удалить комментарий"><i class="fas fa-times"></i></button>-->
                                <span class="toggle-item box">
                                        <span class="toggle-bg">
                                            <input title="Отклонено"  type="radio" name="activity" value="3">
                                            <input title="Одобрено" <?=($comp['activity'] == 2)? 'checked' : ''?> type="radio" name="activity" value="2">
                                            <span class="switch"></span>
                                        </span>
                                </span><br><br>
                                <button class="btn-free" style="color: limegreen; font-size: 20px"><i class="fas fa-check-circle"></i></button>
                            </form>
                        </td>

                </tr>
                <?$i++;}?>
        </table>
    <?}else{?>
        <div class="flex-box">
            Не указано ни одной компетенции
        </div>
    <?}?>

</div>
