<?php 
	require_once("config.php");
    $second_header = true;
    require_once("app/controllers/users.php"); 
	require_once("app/include/header.php");
?>

<div class="conteiner">
    <h1 class="h1-top">AUTHOR Guru 2023
        <span>
            Carbon frame and fork, 12mm axle &nbsp;|&nbsp; SHIMANO GRX 810/600 components, 22 speed &nbsp;|&nbsp; MAVIC ALLROAD DISC CL UST wheel sets
        </span>
    </h1>
</div>

<!-- Main Bike Info -->
<div class="conteiner">
    <div class="main__info__bike">
        <section class="photo__bike">
            <img src="../static/img/svg/BikePhotoTest.svg" title="NAME" alt="NAME">
        </section>
        <section class="k-navi">
            <div class="km-menu" id="go-kestazeni">
                <a href="#!technicka-specifikace" id="km-techspec" class="active">technical specification</a>
                <a href="#!geometrie-modelu" id="km-geometrie">geometry and sizes</a>
                <a href="#!galerie-modelu" id="km-galerie">photogallery</a>
            </div>
            <!-- Тех-характеристика -->
            <div class="kb-list active" id="kb-techspec">
                <h2>Technical specification</h2>
                <div class="techspec-l">
                    <table>
                        <tbody>
                            <tr>
                                <th>Size</th>
                                <td>480, 500, 520, 540, 560 mm</td>
                            </tr>
                            <tr>
                                <th>Frame</th>
                                <td>AUTHOR carbon Toray T700 / M40 monocoque gravel</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="techspec-r">
                    <table>
                        <tbody>
                            <tr>
                                <th>Rims</th>
                                <td>MAVIC Allroad UST Disc CL wheel set, 20 holes</td>
                            </tr>
                            <tr>
                                <th>Wheel set</th>
                                <td>MAVIC Allroad UST Disc CL wheel set 20 holes</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <!-- Геометрия -->
            <div class="kb-list" id="kb-geometrie">

            </div>
            <!-- Фото-галерея -->
            <div class="kb-list" id="kb-galerie">

            </div>
        </section>
    </div>
</div>

<?php include("app/include/footer.php"); ?>