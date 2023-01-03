<?php
    require_once("config.php");
    $second_header = true;
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
                <div class="Bikes-row-text">
                    <a href="<?php echo BASE_URL . 'BikeInfo.php'?>" class="nav-link-all-bike">
                        <p><?php echo $bike_info['category'] . ' велосипед ' . $bike_info['name'] ?></p>
                    </a>
                    <span class="limited-desc-bike"><?php echo $bike_info['description'] ?></span>
                    <span><?php echo selectOne('brands', ['ID' => $bike_info['BID']])['name_company'] ?></span>
                    <span><?php echo $bike_info['season'] ?></span>

                    <?php if (isset($_SESSION['id'])): ?>
                        <form action="AllBike.php" method="post">
                            <button type="submit" value=<?php echo $bike_info['ID'] ?> name="btn-add-favor" class='hello'>
                                В избранное
                            </button>
                            <button type="submit" value=<?php echo $bike_info['ID'] ?> name="btn-add-compr" class='hello'>
                                К сравнению
                            </button>
                        </form>
                    <?php endif; ?>
                </div>
            </div>
            <?php } ?>
            <?php  include("app/include/pagination.php"); ?>
            <?php } ?>
        </div>
    </div>
</div>

<?php include("app/include/footer.php"); ?>