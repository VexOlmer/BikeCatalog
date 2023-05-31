<?php
    include("../../config.php");
    include("../../app/database/db.php");
    include("../../app/include/header_admin.php");
    include("../../app/controllers/images_admin.php");
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
                <h2>Изображения</h2>

                <div class="posts-error">
                    <p><?=$errMsg;?></p>
                </div>

                <table class="table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Категория</th>
                            <th>Название</th>
                            <th>Описание</th>
                            <th>Тип</th>
                            <th>Назначение</th>
                            <th>Уровень оборудования</th>
                            <th>Сезон</th>
                            <th>Управление</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php foreach ($all_bikes as $key => $bike): ?>
                            <?php if(!$bike['status']): ?>
                            <tr style="background: #F08080" >
                            <?php else: ?>
                            <tr>
                            <?php endif; ?>
                                <td><?=$key + 1; ?></td>
                                <td><?=$bike['category']; ?></td>
                                <td><?=$bike['name']; ?></td>
                                <td><?=mb_substr($bike['description'], 0, 50, 'UTF-8'). '...'  ?></td>
                                <td><?=$bike['type']; ?></td>
                                <td><?=$bike['destination']; ?></td>
                                <td><?=$bike['level']; ?></td>
                                <td><?=$bike['season']; ?></td>
                                <td>
                                    <a style="color:blue; font-size:20px" href="<?php echo BASE_URL . "admin/images/edit.php?id=" . $bike['BIKE_ID'];?>">edit</a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>

            </div>
        </div>

    </div>
</div>

<?php include("../../app/include/footer_admin.php"); ?>