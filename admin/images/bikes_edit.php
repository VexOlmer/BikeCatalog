<?php
    include("../../config.php");
    include("../../app/database/db.php");
    include("../../app/include/header_admin.php");
    include("../../app/controllers/images_admin.php");

    $dir = opendir("../../static/img/bikes_db/" . $name);
    $count = 0;     // изображений велосипеда
    while($file = readdir($dir)){
        if($file == '.' || $file == '..' || is_dir('path/to/dir' . $file)){
            continue;
        }
        $count++;
    }
    // echo 'Количество файлов: ' . $count;
?>

<div class="conteiner">
    <div class="content-Admin">

        <?php include "../../app/include/sidebar-admin.php"; ?>

        <div class="posts">
            <div class="button-row">

            <a href="<?php echo BASE_URL . "admin/images/brands.php";?>" class="floating-button">Бренды</a>
                <span class="col-1"></span>
                <a href="<?php echo BASE_URL . "admin/images/bikes.php";?>" class="floating-button">Велосипеды</a>

            </div>
            <div class="row title-table">
                <h2 style="margin-bottom: 20px">Изображения велосипеда <?=$name;?></h2>

                <div class="posts-error">
                    <p><?=$errMsg;?></p>
                </div>

                <form action="bikes_edit.php" method="post" enctype="multipart/form-data">

                    <input type="hidden" name="id" value="<?=$id; ?>">
                    <input type="hidden" name="count_img" value="<?=$count; ?>">

                    <table class="table">
                    <thead>
                        <tr>
                            <th>Номер</th>
                            <th>Тип</th>
                            <th>Просмотр</th>
                            <th>Загрузить новое</th>
                        </tr>
                    </thead>

                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>Главное</td>
                            <td>
                                <img style="width:150px; " alt="Главное изображение" src="<?php echo "../../static/img/bikes_db/" . $name . '/main.jpg' ?>" class="photo_bike_info">
                            </td>
                            <td>
                                <input name="img_main" type="file" class="form-control">
                            </td>
                        </tr>
                        <?php for ($i = 1; $i < $count; $i++){ ?>
                            <tr>
                                <td><?=$i + 1?></td>
                                <td>Дополнительное изображение</td>
                                <td>
                                    <img style="width:150px; " alt="Дополнительное изображение № <?= $i ?>" src="<?php echo "../../static/img/bikes_db/" . $name . '/' . $i . '.jpg' ?>" class="photo_bike_info">
                                </td>
                                <td>
                                    <input name="img <?=$i?>" type="file" class="form-control">
                                </td>
                            </tr>
                        <?php }?>

                    </tbody>
                </table>

                <label class="form-label">Загрузить дополнительно</label>
                <input name="img_add_new[]" type="file" class="form-control" multiple>

                <div style="padding-top: 30px">
                    <button name="edit_bikes_img" class="button-search" type="submit">Обновить</button>
                </div>
                </form>

            </div>
        </div>

    </div>
</div>

<?php include("../../app/include/footer_admin.php"); ?>