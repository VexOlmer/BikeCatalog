<?php

include("app/database/db.php");

$page = isset($_GET['page']) ? $_GET['page'] : 1;
$limit = 2;
$offset = $limit * ($page - 1);  // С какой записи начинать поиск в DB
$total_pages = round(countRow('bikeinfo')[0]['COUNT(*)'] / $limit, 0);

$result = getData("SELECT * FROM bikeinfo WHERE status = '1' LIMIT $limit OFFSET $offset");

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

    $sqlQuery .= "LIMIT $limit OFFSET $offset";

    $result = getData($sqlQuery);

}

if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['btn-del-filter'])){
    $sqlQuery = "SELECT * FROM bikeinfo WHERE status = '1' LIMIT $limit OFFSET $offset";

    $result = getData($sqlQuery);
}

?>