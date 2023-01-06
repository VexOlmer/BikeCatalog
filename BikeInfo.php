<?php 
	require_once("config.php");
    $second_header = true;
    $login_css = false;
    require_once("app/controllers/users.php"); 
	require_once("app/include/header.php");
    require_once("app/controllers/tech_info_bike.php");

    $count_column_info = count($table_tech);

    // Количество строк в левой и правой части таблицы с ТХ
    $kol_left = intdiv($count_column_info, 2);
    
    if($count_column_info % 2 != 0){
        $kol_left += 1;
    }
    $kol_left -= 2;
?>

<!-- Main Bike Info -->
<div class="conteiner">
    <div class="name_info_bike">
        <h1>
            <?php $bike_main['name'] ?>
        </h1> 
    </div>
    
    <div class="image_info_bike">
        <section class="photo__bike">
            <img src="<?php echo "static/img/bikes_db/" . $bike_main['name'] . '/main.jpg'?>" title="NAME" alt="NAME">
        </section>
    </div>

    <div class="main_info_bike">
        <!-- <h2 class="name-tech-spec">Характеристика</h2> -->

        <div class="techspec-l">
            <table>
                <?php 
                    for ($i = 0; $i < $kol_left; $i++){
                        foreach($table_tech[$i] as $key => $value){
                ?>
                <tr>
                    <th class="name-cpes"><?php echo $key ?></th>
                    <td class="name-spec-info"><?php echo $value ?></td>
                </tr>
                <?php }} ?>
            </table>
        </div>

        <div class="techspec-r">
            <table>
                <?php 
                    for ($i = $kol_left; $i < $count_column_info; $i++){
                        foreach($table_tech[$i] as $key => $value){
                ?>
                <tr>
                    <th class="name-cpes"><?php echo $key ?></th>
                    <td class="name-spec-info"><?php echo $value ?></td>
                </tr>
                <?php }} ?>
            </table>
        </div>
    </div>
</div>


<?php require_once("app/include/footer.php"); ?>