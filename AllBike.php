<?php
    include("config.php");
    include("app/include/header.php");
    include("app/database/db.php");
?>

<script src="static/js/search.js"></script>

<div class="conteiner">
    <div class="content-AllBikes">
        <!-- Filter Content -->
        <div class="context-AllBikes-Filter">
            <div class="Filter-search">
                <h3>Сортировка</h3>
            </div>

            <?php
                $filter_column = array("category", "type", "destination", "level", "season");
                $column_ru = array("Категория", "Тип", "Назначение", "Уровень оборудования", "Сезон");
                foreach($filter_column as $key => $column){
            ?>

                <div class="list-group">
                    <h3><?php echo $column_ru[$key] ?></h3>
                    <div class="brandSection">
                        <?php
                            $column_info = getColumn($column);
                            foreach($column_info as $info){	
                        ?>
                            <div class="list-group-item checkbox">
                            <label>
                                <input type="checkbox" class="" value="<?php echo $info[$column]; ?>"> 
                                <?php echo $info[$column]; ?>
                            </label>
                            </div>
                        <?php }	?>
                    </div>
                </div>

            <?php }	?>
        </div>
        <div class="col-md-9">
		    <div class="row searchResult">
            </div>
	    </div>
        <!-- Main Content -->
        <div class="content-AllBikes-main">
            <h2>Название</h2>
            <div class="Bikes-row">
                <div class="Bikes-row-image">
                    <img src="static/img/svg/BikePhotoTest.svg" alt="image" class="Bike-image">
                </div>
                <div class="Bikes-row-text"> </div>
            </div>
        </div>
    </div>
</div>

<?php include("app/include/footer.php"); ?>