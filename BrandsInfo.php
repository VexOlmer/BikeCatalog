<?php
    include("config.php");
    $second_header = true;
    $login_css = false;
    include("app/controllers/brands-info.php");
    include("app/include/header.php");
?>

<div class="conteiner">
    <div class="brands-list">
    <?php for($i=0; $i < count($company_info); $i++){ ?>
        <div class="card">
            <img id="<?php echo "myBtn_" . ($i + 1)?>" 
                        src="<?php echo "static/img/brands/" . $company_info[$i]['name'] . '.jpg'?>" 
                        alt="higway bike" class="img-card-brands">
            <div class="info_card">
                <?php echo $company_info[$i]['name']; ?>
            </div>

            <div id="<?php echo "myModal_" . ($i + 1)?>" class="modal">
                <div class="modal-content" style="width: 680px; left: 398px; top: 110.5px;">
                    <span id="<?php echo "close_" . ($i + 1)?>" class="close">×</span>
                    <table width="100%">
                        <tbody>
                            <tr valign="top">
                                <td>
                                    <table width="160" cellspacing="0" cellpadding="0">
                                        <tbody>
                                            <tr>
                                                <td class="brand-photo">
                                                    <img style="max-width: 140px; max-height: 140px; text-align: center; padding-top: 40%" src="<?php echo "static/img/brands/" . $company_info[$i]['name'] . '.jpg'?>">
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </td>
                                <td width="20">&nbsp;</td>
                                <td>
                                    <?php echo $company_info[$i]['desc']; ?>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    <?php } ?>

    </div>
</div>

<script>
// Get the modal
var modal_1 = document.getElementById('myModal_1');
var modal_2 = document.getElementById('myModal_2');
var modal_3 = document.getElementById('myModal_3');
var modal_4 = document.getElementById('myModal_4');
var modal_5 = document.getElementById('myModal_5');
var modal_6 = document.getElementById('myModal_6');

// Get the button that opens the modal
var btn_1 = document.getElementById("myBtn_1");
var btn_2 = document.getElementById("myBtn_2");
var btn_3 = document.getElementById("myBtn_3");
var btn_4 = document.getElementById("myBtn_4");
var btn_5 = document.getElementById("myBtn_5");
var btn_6 = document.getElementById("myBtn_6");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks the button, open the modal 
btn_1.onclick = function() {
    modal_1.style.display = "block";
}
btn_2.onclick = function() {
    modal_2.style.display = "block";
}
btn_3.onclick = function() {
    modal_3.style.display = "block";
}
btn_4.onclick = function() {
    modal_4.style.display = "block";
}
btn_5.onclick = function() {
    modal_5.style.display = "block";
}
btn_6.onclick = function() {
    modal_6.style.display = "block";
}

// When the user clicks on <span> (x), close the modal
close_1.onclick = function() {
    modal_1.style.display = "none";
}
close_2.onclick = function() {
    modal_2.style.display = "none";
}
close_3.onclick = function() {
    modal_3.style.display = "none";
}
close_4.onclick = function() {
    modal_4.style.display = "none";
}
close_5.onclick = function() {
    modal_5.style.display = "none";
}
close_6.onclick = function() {
    modal_6.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal_1 || event.target == modal_2 || event.target == modal_3 
        || event.target == modal_4 || event.target == modal_5 || event.target == modal_6) {
        modal_1.style.display = "none";
        modal_2.style.display = "none";
        modal_3.style.display = "none";
        modal_4.style.display = "none";
        modal_5.style.display = "none";
        modal_6.style.display = "none";
    }
}
</script>

<?php include("app/include/footer.php"); ?>