<?php
/**
 * Created by PhpStorm.
 * User: Home
 * Date: 27.05.2018
 * Time: 13:43
 */
?>

<div class="experience_table">
    <div class="flex-box">
        <a href="<?=$domain?>experience-add" class="btn-arrow btn-blue">Добавить</a>
    </div><br>
    <div class="experience_history flex-box">

        <ul class="text_left box full-width">
            <?php
            $sql = $pdo->prepare("SELECT * FROM experience  WHERE author='".$logedUser->member_id()."' ORDER BY publ_time DESC");
            $sql->execute();
            if( $sql->rowCount() > 0){
                while($exp = $sql->fetch(PDO::FETCH_LAZY)){
                    $cat = new Post($exp->category);
                    $cat->getTable('categories');?>
                <li>
                    <div class="flex-box flex-vertical-top ">
                        <div>
                            <div><span><?=$exp->start_time ?></span> по <span><?=$exp->end_time ?></span></div>
                            <div><?=$exp->position?></div>
                            <div><?=$exp->company?></div>
                            <div><?=$cat->title()?></div>
                            <div><?=$exp->description?></div>
                        </div>
                        <div class="ghost delete_post right">
                            <form action="<?=$domain?>modules/experience/delete.php" method="POST">
                                <input type="hidden" name="experience_id" value="<?=$exp->id?>"/>
                                <div class="btn-free" title="Удалить опыт"><i class="fas fa-times"></i></div>
                            </form>
                        </div>
                    </div>
                </li>
                <?}
            }else{?>
                <div class="flex-box">
                    Опыт работы еще не указан
                </div>
            <?}?>
        </ul>
    </div>
</div>
<br>
<br>
<br>

<div class="competense_table">
    <div class="flex-box">
        <a href="<?=$domain?>competense-add" class="btn-arrow btn-blue">Добавить</a>
    </div><br>
    <?php
    $i = 1;
    $sql = $pdo->prepare("SELECT * FROM competenses WHERE author='".$logedUser->member_id()."' ORDER BY publ_time DESC");
    $sql->execute();
    if( $sql->rowCount() > 0){?>
        <table class="main_table">
            <tr>
                <th>П/П</th>
                <th>Компетенция</th>
                <th>Направление</th>
                <th>Статус</th>
                <th>Коммментарий</th>
                <th>Коммментарий администратора</th>
                <th>Удалить</th>
            </tr>
            <?
            while($comp = $sql->fetch(PDO::FETCH_LAZY)){
                $compItem = new Post($comp->activity);
                $compItem->getTable('competense_status');
                $cat = new Post($comp->category);
                $cat->getTable('categories');?>
            <tr>
                <td><?=$i?></td>
                <td><a  href="<?=$domain.$comp->photo_small?>" target="_blank" ><?=$comp->title?></a></td>
                <td><?=$cat->title()?></td>
                <td><?=$compItem->title()?></td>
                <td><?=$comp->description?></td>
                <td><?=$comp->comment?></td>
                <td>
                    <div class="ghost delete_post">
                        <form action="<?=$domain?>modules/competense/delete.php" method="POST">
                            <input type="hidden" name="competense_id" value="<?=$comp->id?>"/>
                            <!--<button title="Удалить комментарий"><i class="fas fa-times"></i></button>-->
                            <div class="btn-free" title="Удалить комментарий" ><i class="fas fa-times"></i></div>
                        </form>
                    </div>
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




