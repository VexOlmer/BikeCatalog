<?php
    include("../../config.php");
    include("../../app/database/db.php");
    include("../../app/include/header_admin.php");
    include("../../app/controllers/users_admin.php");
?>

<div class="conteiner">
    <div class="content-Admin">

        <?php include "../../app/include/sidebar-admin.php"; ?>

        <div class="posts">
            <div class="button-row">

                <a href="<?php echo BASE_URL . "admin/users/create.php";?>" class="floating-button">Создать</a>
                <span class="col-1"></span>
                <a href="<?php echo BASE_URL . "admin/users/index.php";?>" class="floating-button">Редактировать</a>

            </div>
            <div class="row title-table">
                <h2 style="margin-bottom: 20px">Редактирование пользователя <?=$username;?></h2>

                <div class="posts-error">
                    <p><?=$errMsg;?></p>
                </div>

                <form action="edit.php" method="post" enctype="multipart/form-data">

                    <input type="hidden" name="id" value="<?=$id; ?>">

                    <div>
                        <label class="form-label">Никнейм</label>
                        <input value="<?=$username;?>" name="username" type="text" class="form-control" placeholder="Имя пользователя">
                    </div>

                    <div>
                        <label class="form-label">Почта</label>
                        <input value="<?=$email;?>" name="email" type="email" class="form-control" placeholder="Почта">
                    </div>

                    <div>
                        <label class="form-label">Пароль</label>
                        <input name="pass_first" type="password" class="form-control" placeholder="Пароль">
                    </div>

                    <div>
                        <label class="form-label">Повторите пароль</label>
                        <input name="pass_second" type="password" class="form-control" placeholder="Повторите пароль">
                    </div>

                    <?php if ($admin === 0): ?>
                        <input name="admin" class="form-check-input" type="checkbox" id="flexCheckChecked">
                        <label class="form-check-label" for="flexCheckChecked">
                            Admin
                        </label>
                    <?php else: ?>
                        <input name="admin" class="form-check-input" type="checkbox" id="flexCheckChecked" checked>
                        <label class="form-check-label" for="flexCheckChecked">
                            Admin
                        </label>
                    <?php endif; ?>

                    <div style="padding-top: 30px">
                        <button name="edit_users" class="button-search" type="submit">Обновить</button>
                    </div>
                </form>

            </div>
        </div>

    </div>
</div>

<?php include("../../app/include/footer_admin.php"); ?>