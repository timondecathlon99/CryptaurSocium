<?php
/**
 * Created by PhpStorm.
 * User: Zhitkov
 * Date: 29.05.2018
 * Time: 9:34
 */
?>

<div class="competenses-form box flex-box ">
    <form enctype="multipart/form-data" action="<?=$domain?>modules/competense/create.php" method="POST">
        <input  type="hidden" name="author" value="<?=$logedUser->member_id()?>"/>
        <div class="flex-box flex-between flex-vertical-center">
            <div class="flex-box">
                <span>Направление</span>
            </div>
            <div class="right">
                <select type="text" name="category" >
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
                <span>Компетенции</span>
            </div>
            <div class="right">
                <select required name="title">
                    <option value="Диплом об окончании вуза">Диплом об окончании вуза</option>
                    <option value="Сертификат о прохождении курсов">Сертификат о прохождении курсов</option>
                    <option value="Сертификат о чем то еще">Сертификат о чем то еще</option>
                </select>
            </div>
        </div>
        <div class="flex-box flex-between flex-vertical-center">
            <div>
                <span>Документ</span>
            </div>
            <div class="file_input" class="flex-box right">
                <input required id="record_file" class="record_file" type="file" name="file" accept="image/*,image/jpeg" />
                <div class="flex-box full-width">
                    <input required required id="files" type="text"  placeholder="Файл не выбран"  disabled/>
                    <label class="btn-blue record_file_label" for="record_file"><span><i class="far fa-save"></i></span></label>
                </div>

                <script>
                    $(document).ready( function() {
                        $("#record_file").change(function(){
                            var filename = $(this).val().replace(/.*\\/, "");
                            $("#files").val(filename);
                        });
                    });
                </script>
            </div>
        </div><br>
        <div class="flex-box flex-between flex-vertical-center">
            <div>
                <span>Комментарий</span>
            </div>
            <div class="right">
                <textarea required name="description"></textarea>
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