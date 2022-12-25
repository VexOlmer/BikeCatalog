<?php

include("app/database/db.php");

$result = getData("SELECT * FROM bikeinfo WHERE status = '1'");

// Авторизация
if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['btn-show-filter'])){

    $sqlQuery = "SELECT * FROM bikeinfo WHERE status = '1'";
    $filter_column = array("category", "type", "destination", "level", "season");

    foreach($filter_column as $key => $column){
        if(isset($_POST[$column])){

            $filterData = implode("','", $_POST[$column]);
            $sqlQuery .= "
                AND $column IN('".$filterData."')";
        }
    }

    $result = getData($sqlQuery);

}

if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['btn-del-filter'])){
    $sqlQuery = "SELECT * FROM bikeinfo WHERE status = '1'";

    $result = getData($sqlQuery);
}

?>