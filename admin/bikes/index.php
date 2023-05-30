<?php
    include("../../config.php");
    include("../../app/database/db.php");
    include("../../app/include/header_admin.php");
    include("../../app/controllers/bikes_admin.php");
?>

<div class="conteiner">
    <div class="content-Admin">

        <?php include "../../app/include/sidebar-admin.php"; ?>

        <div class="posts">
            <div class="button-row">

                <a href="<?php echo BASE_URL . "admin/bikes/create.php";?>" class="floating-button">Создать</a>
                <span class="col-1"></span>
                <a href="<?php echo BASE_URL . "admin/bikes/index.php";?>" class="floating-button">Редактировать</a>

            </div>
            <div class="row title-table">
                <h2>Велосипеды</h2>

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
                                    <a href="<?php echo BASE_URL . "admin/bikes/edit.php?id=" . $bike['BIKE_ID'];?>">edit</a>
                                    <a href="<?php echo BASE_URL . "admin/bikes/index.php?delete_id=" . $bike['BIKE_ID'];?>">delete</a>
                                    <?php if($bike['status']): ?>
                                        <a href="<?php echo BASE_URL . "admin/bikes/index.php?publish_id=" . $bike['BIKE_ID'];?>">unpublish</a>
                                    <?php else: ?>
                                        <a href="<?php echo BASE_URL . "admin/bikes/index.php?publish_id=" . $bike['BIKE_ID'];?>">publish</a>
                                    <?php endif; ?>
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