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
            <div class="Filter-search">
                <h3>Сортировка</h3>
            </div>

            <form action="AllBike.php" method="post">

                <?php
                    $filter_column = array("category", "type", "destination", "level", "season");
                    $column_ru = array("Категория", "Тип", "Назначение", "Уровень оборудования", "Сезон");
                    foreach($filter_column as $key => $column){
                ?>

                <div class="list-group">
                    <h3><?php echo $column_ru[$key] ?></h3>
                    <div class="brandSection">
                        <?php
                            $column_info = getColumn('bikeinfo', $column);
                            foreach($column_info as $info){	
                        ?>
                            <div class="list-group-item checkbox">
                            <label>
                                <?php if(isset($_GET['category']) and $info[$column] === $_GET['category']): ?>
                                    <input type="checkbox" checked='checked' class="" value="<?php echo $info[$column]; ?>" name="<?php echo $filter_column[$key]; ?>[]" >
                                <?php else: ?>
                                    <input type="checkbox" class="" value="<?php echo $info[$column]; ?>" name="<?php echo $filter_column[$key]; ?>[]" >
                                <?php endif; ?>
                                <?php echo $info[$column]; ?>
                            </label>
                            </div>
                        <?php }	?>
                    </div>
                </div>
                <?php }	?>
                <input type="submit" value="Показать" name="btn-show-filter">
                <input type="submit" value="Сбросить" name="btn-del-filter">
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
                    <a href="<?php echo BASE_URL . 'BikeInfo.php'?>" class="nav-link">
                        <p><?php echo $bike_info['category'] . ' велосипед ' . $bike_info['name'] ?></p>
                    </a>
                    <br/>
                    <p class="limited-desc-bike"><?php echo $bike_info['description'] ?></p>
                    <br/>
                    <p><?php echo selectOne('brands', ['ID' => $bike_info['BID']])['name'] ?></p>
                    <br/>
                    <p><?php echo $bike_info['season'] ?></p>

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
            <?php }} ?>
            <?php  include("app/include/pagination.php"); ?>
        </div>
    </div>
</div>

<?php include("app/include/footer.php"); ?>