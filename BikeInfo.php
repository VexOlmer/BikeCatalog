<?php 
	require_once("config.php");
    require_once("app/controllers/users.php"); 
    require_once("app/controllers/tech_info_bike.php");

    $second_header = true;
    $login_css = false;
    $name_sec_header = 'Характеристика';
    $see_ref_filter = true;
    $name_last_sec_header = $bike_main['name'];
    
	require_once("app/include/header.php");

    $count_column_info = count($table_tech);

    // Количество строк в левой и правой части таблицы с ТХ
    $kol_left = intdiv($count_column_info, 2);
    
    if($count_column_info % 2 != 0){
        $kol_left += 1;
    }
    $kol_left -= 2;

    $count_files = count(scandir('static/img/bikes_db/' . $bike_main['name'])) - 3;  // Кол-во фото для слайдера
?>

<!-- Main Bike Info -->
<div class="conteiner">
    <div class="name_info_bike">
        <h1>
            <?php echo $bike_main['name'] ?>
        </h1> 
    </div>

    <div class="container">
        <div class="mySlides">
            <img src="<?php echo "static/img/bikes_db/" . $bike_main['name'] . '/main.jpg' ?>" class="photo_bike_info">
        </div>

        <?php for ($i = 1; $i <= $count_files; $i++){ ?>
            <div class="mySlides">
                <img src="<?php echo "static/img/bikes_db/" . $bike_main['name'] . '/' . $i . '.jpg' ?>" class="photo_bike_info">
            </div>
        <?php }?>

        <?php if($count_files): ?>
            <a class="prev" onclick="plusSlides(-1)">❮</a>
            <a class="next" onclick="plusSlides(1)">❯</a>
        <?php endif; ?>

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

<script>
    var slideIndex = 1;
    showSlides(slideIndex);

    function plusSlides(n) {
    showSlides(slideIndex += n);
    }

    function currentSlide(n) {
    showSlides(slideIndex = n);
    }

    function showSlides(n) {
    var i;
    var slides = document.getElementsByClassName("mySlides");
    var dots = document.getElementsByClassName("demo");
    var captionText = document.getElementById("caption");
    if (n > slides.length) {slideIndex = 1}
    if (n < 1) {slideIndex = slides.length}
    for (i = 0; i < slides.length; i++) {
    slides[i].style.display = "none";
    }
    for (i = 0; i < dots.length; i++) {
    dots[i].className = dots[i].className.replace(" active", "");
    }
    slides[slideIndex-1].style.display = "block";
    dots[slideIndex-1].className += " active";
    captionText.innerHTML = dots[slideIndex-1].alt;
    }
</script>

<?php require_once("app/include/footer.php"); ?>