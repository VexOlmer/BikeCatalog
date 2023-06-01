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
                <h2 style="margin-bottom: 20px">Логотип бренда <?=$name;?></h2>

                <div class="posts-error">
                    <p><?=$errMsg;?></p>
                </div>

                <form action="brands_edit.php" method="post" enctype="multipart/form-data">

                    <input type="hidden" name="id" value="<?=$id; ?>">

                    <img id="<?=$id; ?>" 
                        src="<?php echo "../../static/img/brands/" . $name . '.jpg'?>" 
                        alt="higway bike" class="img-card-brands">

                    <div>
                        <label class="form-label">Эмблема компании</label>
                        <input name="img" type="file" class="form-control">
                    </div>

                    <div style="padding-top: 30px">
                        <button name="edit_brand_img" class="button-search" type="submit">Обновить</button>
                    </div>
                </form>

            </div>
        </div>

    </div>
</div>

<?php include("../../app/include/footer_admin.php"); ?>