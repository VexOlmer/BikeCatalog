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

            <form action="edit.php" method="post" enctype="multipart/form-data">
            <div class="row title-table">
                <h2 style="margin-bottom: 20px">Редактирование велосипеда <?=$bike_edit['name']?></h2>

                <div class="posts-error">
                    <p><?=$errMsg;?></p>
                </div>

                <input type="hidden" name="id" value="<?=$id; ?>">

                <div class="techspec-l">
                    <table>
                        <tr>
                            <th class="name-cpes">Категория</th>
                            <td class="name-spec-info">
                                <select name="category" class="form-select mb-2" aria-label="Default select example">
                                    
                                    <?php if ($bike_edit['category'] != 'шоссейный'): ?>
                                        <option value="шоссейный">Шоссейный</option>
                                    <?php endif; ?>

                                    <?php if ($bike_edit['category'] != 'горный'): ?>
                                        <option value="горный">Горный</option>
                                    <?php endif; ?>

                                    <?php if ($bike_edit['category'] != 'прогулочный'): ?>
                                        <option value="прогулочный">Прогулочный</option>
                                    <?php endif; ?>

                                    <?php if ($bike_edit['category'] != 'беговел'): ?>
                                        <option value="беговел">Беговел</option>
                                    <?php endif; ?>

                                    <?php if ($bike_edit['category'] != 'bmx'): ?>
                                        <option value="bmx">BMX</option>
                                    <?php endif; ?>

                                    <?php if ($bike_edit['category'] != 'электровелосипед'): ?>
                                        <option value="электровелосипед">Электровелосипед</option>
                                    <?php endif; ?>

                                    <option selected value="<?=$bike_edit['category']?>"><?=$bike_edit['category']?></option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <th class="name-cpes">Название</th>
                            <td class="name-spec-info"><input name="name" value="<?=$bike_edit['name']?>" type="text" class="form-control"></td>
                        </tr>
                        <tr>
                            <th class="name-cpes">Описание</th>
                            <td class="name-spec-info"><input name="description" value="<?=$bike_edit['description']?>" type="text" class="form-control"></td>
                        </tr>
                        <tr>
                            <th class="name-cpes">Бренд</th>
                            <td class="name-spec-info">
                                <select name="BID" class="form-select mb-2" aria-label="Default select example">
                                    <?php foreach ($all_company as $key => $company): ?>
                                        <?php if ($bike_edit['BID'] === $company['BRANDS_ID']): ?>
                                            <option selected value="<?=$company['BRANDS_ID']; ?>"><?=$company['name_company'];?></option>
                                        <?php else: ?>
                                            <option value="<?=$company['BRANDS_ID']; ?>"><?=$company['name_company'];?></option>
                                        <?php endif; ?>
                                    <?php endforeach; ?>
                                </select>
                            </td>
                        </tr>
                    </table>
                </div>

                <div class="techspec-r">
                    <table>
                        <tr>
                            <th class="name-cpes">Тип</th>
                            <td class="name-spec-info"><input name="type" value="<?=$bike_edit['type']?>"  type="text" class="form-control"></td>
                        </tr>
                        <tr>
                            <th class="name-cpes">Назначение</th>
                            <td class="name-spec-info"><input name="destination" value="<?=$bike_edit['destination']?>"  type="text" class="form-control"></td>
                        </tr>
                        <tr>
                            <th class="name-cpes">Уровень оборудования</th>
                            <td class="name-spec-info"><input name="level" value="<?=$bike_edit['level']?>"  type="text" class="form-control"></td>
                        </tr>
                        <tr>
                            <th class="name-cpes">Сезон</th>
                            <td class="name-spec-info"><input name="season" value="<?=$bike_edit['season']?>"  type="text" class="form-control"></td>
                        </tr>
                    </table>
                </div>

                <?php
                    $techspec_l = array(
                        "frame_material" => "Материал рамы", "frame" => "рама",
                        "wheel_mount" => "Крепление колеса", "fork_design" => "Конструкция вилки",
                        "fork" => "Вилка", "front_hub" => "Передняя втулка", "rear_hub" => "Задняя втулка",
                        "rims" => "Обода", "steering_wheel" => "Руль", "number_speeds" => "Количество скоростей",
                        "rear_derailleur" => "Задний переключатель", "front_derailleur" => "Передний переключатель",
                    );
                    $techspec_r = array(
                        "cassette" => "Кассета", "carriage" => "Каретка", "system" => "Система", "shifters" => "Манетки",
                        "tires" => "Покрышки", "brake_type" => "Тип тормозов", "front_brake" => "Передний тормоз",
                        "rear_brake" => "Задний тормоз", "pedals" => "Педали", "seatpost" => "Подседельный штырь",
                        "saddle" => "Седло", "wheel_size" => "Размер колес в дм"
                    );
                ?>

                <div class="techspec-l" style="margin-top:50px">
                    <table>
                        <?php foreach ($techspec_l as $key => $value): ?>
                            <tr>
                                <th class="name-cpes"><?=$value?></th>
                                <td class="name-spec-info"><input value="<?=$tech_edit[$key]?>" name=<?=$key?> type="text" class="form-control"></td>
                            </tr>
                        <?php endforeach; ?>
                    </table>
                </div>

                <div class="techspec-r" style="margin-top:50px">
                    <table>
                        <?php foreach ($techspec_r as $key => $value): ?>
                            <tr>
                                <th class="name-cpes"><?=$value?></th>
                                <td class="name-spec-info"><input value="<?=$tech_edit[$key]?>" name=<?=$key?> type="text" class="form-control"></td>
                            </tr>
                        <?php endforeach; ?>
                    </table>
                </div>

            </div>

            <?php if ($bike_edit['status'] === 0): ?>
                <input name="status" class="form-check-input" type="checkbox" id="flexCheckChecked">
                <label class="form-check-label" for="flexCheckChecked">
                    Publish
                </label>
            <?php else: ?>
                <input name="status" class="form-check-input" type="checkbox" id="flexCheckChecked" checked>
                <label class="form-check-label" for="flexCheckChecked">
                    Publish
                </label>
            <?php endif; ?>

            <div style="padding-top: 30px">
                <button name="edit_bikes" class="button-search" type="submit">Обновить</button>
            </div>

            </form>
        </div>

    </div>
</div>

<?php include("../../app/include/footer_admin.php"); ?>