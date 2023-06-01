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
                            <th>Название</th>
                            <th>Описание</th>
                            <th>Управление</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php foreach ($all_brands as $key => $brand): ?>
                            <tr>
                                <td><?=$key + 1; ?></td>
                                <td><?=$brand['name_company']; ?></td>
                                <td><?=mb_substr($brand['description_company'], 0, 50, 'UTF-8'). '...'  ?></td>
                                <td>
                                    <a style="color:blue; font-size:20px" href="<?php echo BASE_URL . "admin/images/brands_edit.php?id=" . $brand['BRANDS_ID'];?>">edit</a>
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