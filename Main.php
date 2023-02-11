<?php
    include("config.php");
    $second_header = false;
    $login_css = false;
    include("app/database/db.php");
    include("app/include/header.php");
?>

<div class="wrapper">
    
</div>

<div class="conteiner">
    <div class="category-main">
        <div class="card" onclick="window.location.href = '<?php echo BASE_URL . 'AllBike.php' . '?category=шоссейный'?>'">
            <img src="static/img/main_page/highway.jpg" alt="higway bike" class="img-card">
            <div class="info_card">
                Шоссейные велосипеды
            </div>
        </div>
        <div class="card" onclick="window.location.href = '<?php echo BASE_URL . 'AllBike.php' . '?category=горный'?>'">
            <img src="static/img/main_page/mountain.jpg" alt="mountain bike" class="img-card">
                <div class="info_card">
                    Горные велосипеды
                </div>
        </div>
        <div class="card" onclick="window.location.href = '<?php echo BASE_URL . 'AllBike.php' . '?category=прогулочный'?>'">
            <img src="static/img/main_page/touring.jpg" alt="touring bike" class="img-card">
                <div class="info_card">
                    Прогулочные велосипеды
                </div>
        </div>
        <div class="card" onclick="window.location.href = '<?php echo BASE_URL . 'AllBike.php' . '?category=беговел'?>'">
                <img src="static/img/main_page/begovel.jpg" alt="begovel bike" class="img-card">
                <div class="info_card">
                    Беговелы
                </div>
        </div>
        <div class="card" onclick="window.location.href = '<?php echo BASE_URL . 'AllBike.php' . '?category=bmx'?>'">
                <img src="static/img/main_page/bmx.jpg" alt="bmx bike" class="img-card">
                <div class="info_card">
                    BMX
                </div>
        </div>
        <div class="card" onclick="window.location.href = '<?php echo BASE_URL . 'AllBike.php' . '?category=электровелосипед'?>'">
                <img src="static/img/main_page/electric.jpg" alt="electric bike" class="img-card">
                <div class="info_card">
                    Электровелосипеды
                </div>
        </div>
    </div>
</div>

<?php include("app/include/footer.php"); ?>