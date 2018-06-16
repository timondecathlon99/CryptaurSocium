<?php
/**
 * Created by PhpStorm.
 * User: Zhitkov
 * Date: 29.05.2018
 * Time: 9:39
 */
?>
<script>
    $(document).ready(function(){
        $(document).on('input', '.exp_date', function () {
            $('#finish').attr('min',$('#start').val())
        });
    });
</script>

<div class="competenses-form box">
    <div>
        <form action="<?=$domain?>modules/experience/create.php" method="POST" >
            <input  type="hidden" name="author" value="<?=$logedUser->member_id()?>"/>
            <div class="flex-box flex-between flex-vertical-center">
                <div>
                    <span>Дата с </span>
                </div>
                <div class="flex-box flex-vertical-center flex-vertical-center">
                    <div>
                        <input id="start" class="exp_date" required type="date" name="start_time"/>
                    </div>
                    <div>
                        по
                    </div>
                    <div>
                        <input id="finish" class="exp_date"  required type="date" name="end_time"/>
                    </div>
                </div>
            </div>
            <div class="flex-box flex-between flex-vertical-center">
                <div>
                    <span>Организация</span>
                </div>
                <div class="right">
                    <input required type="text"  name="company"/>
                </div>
            </div>
            <div class="flex-box flex-between flex-vertical-center">
                <div>
                    <span>Должность</span>
                </div>
                <div class="right">
                    <input required type="text" name="position"/>
                </div>
            </div>
            <div class="flex-box flex-between flex-vertical-center">
                <div class="flex-box">
                    <span>Направление</span>
                </div>
                <div class="right">
                    <select required name="category"  >
                        <?php
                        $cat = new Post(0);
                        $cat->getTable('categories');
                        foreach ($cat->getAllUnits() as $category){?>
                            <option value="<?=$category['id']?>" ><?=$category['title']?></option>
                        <?}?>
                    </select>
                </div>
            </div>
            <div class="flex-box flex-between flex-vertical-center">
                <div>
                    <span>Описание</span>
                </div>
                <div class="right">
                    <textarea required type="text" name="description"></textarea>
                </div>
            </div>
            <div class="box">

            </div>
            <div class="flex-box flex-between">
                <div>

                </div>
                <div class="flex-box right">
        `           <div>
                        <button disabled class="btn-arrow btn-red"><a href="<?=$domain?>competenses"> Отменить</a></button>
                    </div>
                    <div>
                        <button class="btn-arrow btn-blue right" style="margin-left :20px;">Далее</button>
                    </div>
                </div>
            </div>
        </form>
    </div>

</div>