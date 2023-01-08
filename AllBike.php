<?php
    require_once("config.php");
    $second_header = true;
    $login_css = false;
    $name_sec_header = 'Велосипеды';
    $see_ref_filter = false;
    $name_last_sec_header = 'Велосипеды';

    require_once("app/controllers/searchBike.php");
    require_once("app/controllers/favor-compr.php");
    require_once("app/include/header.php");

?>

<div class="conteiner">
    <div class="content-AllBikes">
        <!-- Filter Content -->
        <div class="context-AllBikes-Filter">
            <!-- <div class="Filter-search">
                <h3>Сортировка</h3>
            </div> -->

            <form action="AllBike.php" method="post" id="filter-form">

                <?php
                    $filter_column = array("category", "type", "destination", "level", "season", "name_company");
                    $column_ru = array("Категория", "Тип", "Назначение", "Уровень оборудования", "Сезон", "Компания");
                    $table = array("bikeinfo", "bikeinfo", "bikeinfo", "bikeinfo", "bikeinfo", "brands");

                    foreach($filter_column as $key => $column){
                ?>

                <div class="list-group">
                    <!-- Название категории на русском -->
                    <?php if($column_ru[$key] == 'Компания'): ?>
                        <a href="<?php echo BASE_URL . 'BrandsInfo.php'?>" class="bikes-row-title">
                            <h3 class="name-filter-group"><?php echo $column_ru[$key] ?></h3>
                        </a>
                    <?php else: ?>
                        <h3 class="name-filter-group"><?php echo $column_ru[$key] ?></h3> 
                    <?php endif; ?> 
                    <div class="brandSection">
                        <?php
                            $column_info = getColumn($table[$key], $column);
                            foreach($column_info as $info){	
                        ?>
                            <div class="checkbox">
                            <label>
                                <?php if($info[$column] != '-'): ?>
                                    <?php if(in_array($info[$column], $column_true_filter) or isset($_GET['category']) and $info[$column] === $_GET['category']): ?>
                                        <input type="checkbox" checked='checked' value="<?php echo $info[$column]; ?>" name="<?php echo $filter_column[$key]; ?>[]" >
                                    <?php else: ?>
                                        <input type="checkbox" value="<?php echo $info[$column]; ?>" name="<?php echo $filter_column[$key]; ?>[]" >
                                    <?php endif; ?>
                                    <?php echo $info[$column]; ?>
                                <?php endif; ?>
                            </label>
                            </div>
                        <?php }	?>
                    </div>
                </div>
                <?php }	?>

                <div class="button-search-drop">
                    <button class="button-search" type="submit" name="btn-show-filter">Показать</button>
                </div>
                <div class="button-search-drop">
                    <button class="button-drop-search" type="submit" name="btn-del-filter">Сбросить</button>
                </div>
        </div>
        
        <!-- Main Content -->
        <div class="content-AllBikes-main">
            <?php
                if(empty($result)){
            ?>
                    <h1 style="font-size: 30px; padding-top: 30px; padding-left: 250px;">
                        Ни один велосипед не найден
                    </h1> 
            <?php   }
                else{

                    // $user_favor_comp = selectOne('favor_comp', array('ID' => $_SESSION['id']));
                    // $i = 0;  // для итерации по сравнению/избранному

                    // $user_favor = array();
                    // $user_comp = array();

                    // if ($user_favor_comp):
                    //     $user_favor = explode(",", $user_favor_comp['favorites']);
                    //     $user_comp = explode(",", $user_favor_comp['comparsion']);
                    // endif;

                    foreach($result as $bike_info){
            ?>
            <div class="Bikes-row">
                <div class="Bikes-row-image">
                    <img src="<?php echo "static/img/bikes_db/" . $bike_info['name'] . '/main.jpg'?>" alt="image" class="Bike-image" 
                            onclick="window.location.href = '<?php echo BASE_URL . 'BikeInfo.php?bike=' . $bike_info['BIKE_ID']?>'">
                </div>
                <span class="bikes-row-text">
                    <a href="<?php echo BASE_URL . 'BikeInfo.php?bike=' . $bike_info['BIKE_ID']?>" class="bikes-row-title">
                        <span><?php echo $bike_info['category'] . ' велосипед ' . $bike_info['name'] ?></span>
                    </a>
                    <span class="limited-desc-bike"><?php echo $bike_info['description'] ?></span>

                    <span class="brand_collection">
							<span class="brand">
                                <span class="label">Бренд:</span>
                                <span class="blue">
                                    <?php echo selectOne('brands', ['BRANDS_ID' => $bike_info['BID']])['name_company'] ?>
                                </span>
                            </span>
							<span class="collection">
                                <span class="label">Сезон:</span>
                                <span class="value">
                                    <?php echo $bike_info['season'] ?>
                                </span>
                            </span>
					</span>

                    <!-- Только если user авторизован -->
                    <?php if (isset($_SESSION['id'])): ?>
                        <span class="bikes-row-checks">

                        <!-- Сравнение -->
                        <!-- <?php if (in_array($bike_info['BIKE_ID'], $user_comp)): ?>
                            <span class="check">
                                <input type="checkbox" checked=checked onclick=checkFluency(); id="comp" name="comp" value="<?php echo $bike_info['BIKE_ID'] ?>">
                                <label>к сравнению</label>
                                <i>

                                </i>
                            </span>
                        <?php else: ?>
                            <span class="check">
                                <input type="checkbox" onclick=checkFluency(); id="comp" name="comp" value="<?php echo $bike_info['BIKE_ID'] ?>">
                                <label>к сравнению</label>
                                <i>

                                </i>
                            </span>
                        <?php endif; ?> -->

                        <!-- Избранное -->
                        <!-- <?php if (in_array($bike_info['BIKE_ID'], $user_favor)): ?>
                            <span class="check">
                                <input type="checkbox" checked=checked onclick=checkFluency(); id="favor" name="favor" value="<?php echo $bike_info['BIKE_ID'] ?>">
                                <label>в избранное</label>
                            </span>
                        <?php else: ?>
                            <span class="check">
                                <input type="checkbox" onclick=checkFluency(); id="favor" name="favor" value="<?php echo $bike_info['BIKE_ID'] ?>">
                                <label>в избранное</label>
                            </span>
                        <?php endif; ?> -->
                        </span>
                    <?php endif; ?>
                </span>
            </div>
            <?php } ?>
            <?php  include("app/include/pagination.php"); ?>
            <?php } ?>
        </div>
    </div>
</div>

</form>

<script>
    function checkFluency(){
    let form  = document.getElementById('filter-form');
    form.submit();
}
</script>

<?php include("app/include/footer.php"); ?>