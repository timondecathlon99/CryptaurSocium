<?php
/**
 * Created by PhpStorm.
 * User: Zhitkov
 * Date: 06.06.2018
 * Time: 11:10
 */
?>
<div class="competense_table">
        <table class="main_table">
            <tr>
                <th>Пользователь</th>
                <th>Статус</th>
            </tr>
            <?
            $members = new Member(0);
            foreach($members->getAllUnits() as $member){
                $member = new Member($member['id']); ?>
                <tr>
                    <td><a  href="<?=$domain?>user/<?=$member->member_id()?>" target="_blank" ><?=$member->surName().' '.$member->fatherName()?></a></td>
                    <td><?=$member->group_name()?></td>
                </tr>
                <?}?>
        </table>

</div>
