<?php
    require_once("config.php");
    $second_header = true;
    $login_css = false;
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

            <form action="AllBike.php" method="post">

                <?php
                    $filter_column = array("category", "type", "destination", "level", "season", "name_company");
                    $column_ru = array("Категория", "Тип", "Назначение", "Уровень оборудования", "Сезон", "Компания");
                    $table = array("bikeinfo", "bikeinfo", "bikeinfo", "bikeinfo", "bikeinfo", "brands");
                    foreach($filter_column as $key => $column){
                ?>

                <div class="list-group">
                    <!-- Название категории на русском -->
                    <h3 class="name-filter-group"><?php echo $column_ru[$key] ?></h3>  
                    <div class="brandSection">
                        <?php
                            $column_info = getColumn($table[$key], $column);
                            foreach($column_info as $info){	
                        ?>
                            <div class="checkbox">
                            <label>
                                <?php if($info[$column] != ''): ?>
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

            </form>
        </div>

        <!-- Main Content -->
        <div class="content-AllBikes-main">
            <?php
                if(empty($result)){
                    echo 'Ни один велосипед не найден.';
                }
                else{
                    foreach($result as $bike_info){
            ?>
            <div class="Bikes-row">
                <div class="Bikes-row-image">
                    <img src="static/img/svg/BikePhotoTest.svg" alt="image" class="Bike-image" 
                            onclick="window.location.href = '<?php echo BASE_URL . 'BikeInfo.php'?>'">
                </div>
                <span class="bikes-row-text">
                    <a href="<?php echo BASE_URL . 'BikeInfo.php'?>" class="bikes-row-title">
                        <span><?php echo $bike_info['category'] . ' велосипед ' . $bike_info['name'] ?></span>
                    </a>
                    <span class="limited-desc-bike"><?php echo $bike_info['description'] ?></span>

                    <span class="brand_collection">
							<span class="brand">
                                <span class="label">Бренд:</span>
                                <span class="blue">
                                    <?php echo selectOne('brands', ['ID' => $bike_info['BID']])['name_company'] ?>
                                </span>
                            </span>
							<span class="collection">
                                <span class="label">Сезон:</span>
                                <span class="value">
                                    <?php echo $bike_info['season'] ?>
                                </span>
                            </span>
					</span> 
                    <!-- <span class="bikes-row-checks">
                        <span class="check">
                            <input type="checkbox" id="compare2541121" value="1" onchange="compareClick(2541121);">
                            <label for="compare2541121">к сравнению</label>
                            <i>
                            </i>
                        </span>
                        <span class="check"><input type="checkbox" id="notepad2541121" value="1" onchange="notepadClick(2541121, 'list');">
                        <label for="notepad2541121">в избранное</label><i></i></span>
                    </span> -->
                </span>
            </div>
            <?php } ?>
            <?php  include("app/include/pagination.php"); ?>
            <?php } ?>
        </div>
    </div>
</div>

<?php include("app/include/footer.php"); ?>