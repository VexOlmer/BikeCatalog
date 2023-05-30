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
                <h2>Пользователи</h2>

                <div class="posts-error">
                    <p><?=$errMsg;?></p>
                </div>

                <table class="table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Никнейм</th>
                            <th>Почта</th>
                            <th>Роль</th>
                            <th>Управление</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($all_users as $key => $user): ?>
                            <?php if($user['admin']): ?>
                            <tr style="background: #F08080" >
                            <?php else: ?>
                            <tr>
                            <?php endif; ?>

                                <td><?=$key + 1; ?></td>
                                <td><?=$user['username']; ?></td>
                                <td><?=$user['email']; ?></td>
                                <td>
                                    <?php if ($user['admin'] == 1): ?>
                                        Admin
                                    <?php else: ?>
                                        User
                                    <?php endif; ?>
                                </td>
                                <td>
                                    <a href="<?php echo BASE_URL . "admin/users/edit.php?id=" . $user['USER_ID'];?>">edit</a>
                                    
                                    <!-- Сам себя admin удалить не может -->
                                    <?php if ($_SESSION['id'] != $user['USER_ID']): ?>
                                        <a href="<?php echo BASE_URL . "admin/users/index.php?delete_id=" . $user['USER_ID'];?>">delete</a>
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