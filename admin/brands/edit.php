<?php
    include("../../config.php");
    include("../../app/database/db.php");
    include("../../app/include/header_admin.php");
    include("../../app/controllers/brands_admin.php");
?>

<div class="conteiner">
    <div class="content-Admin">

        <?php include "../../app/include/sidebar-admin.php"; ?>

        <div class="posts">
            <div class="button-row">

                <a href="<?php echo BASE_URL . "admin/brands/create.php";?>" class="floating-button">Создать</a>
                <span class="col-1"></span>
                <a href="<?php echo BASE_URL . "admin/brands/index.php";?>" class="floating-button">Редактировать</a>

            </div>
            <div class="row title-table">
                <h2 style="margin-bottom: 20px">Редактирование компании <?=$name;?></h2>

                <div class="posts-error">
                    <p><?=$errMsg;?></p>
                </div>

                <form action="edit.php" method="post" enctype="multipart/form-data">

                    <input type="hidden" name="id" value="<?=$id; ?>">

                    <div>
                        <input name="name" value="<?=$name;?>" type="text" class="form-control" placeholder="Название">
                    </div>

                    <div>
                        <label class="form-label">Описание компании</label>
                        <textarea name="desc" class="form-control" rows="20" cols="125"><?=$desc;?></textarea>
                    </div>

                    <!-- <div>
                        <label class="form-label">Эмблема компании</label>
                        <input name="img" type="file" class="form-control">
                    </div> -->

                    <div style="padding-top: 30px">
                        <button name="edit_brand" class="button-search" type="submit">Обновить</button>
                    </div>
                </form>

            </div>
        </div>

    </div>
</div>

<?php include("../../app/include/footer_admin.php"); ?>