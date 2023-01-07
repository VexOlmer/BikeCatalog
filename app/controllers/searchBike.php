<?php

include("app/database/db.php");

$page = isset($_GET['page']) ? $_GET['page'] : 1;
$limit = 3;
$offset = $limit * ($page - 1);  // С какой записи начинать поиск в DB
$total_pages = round(countRow('bikeinfo')[0]['COUNT(*)'] / $limit, 0);

$result = getData("SELECT * FROM bikeinfo WHERE status = '1' LIMIT $limit OFFSET $offset");
$column_true_filter = array();  // Запоминание галочек в фильтре

// Авторизация
if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['btn-show-filter'])){

    $sqlQuery = "SELECT * FROM bikeinfo INNER JOIN brands ON bikeinfo.BID=brands.BRANDS_ID WHERE status = '1'";
    $filter_column = array("category", "type", "destination", "level", "season", "name_company");

    foreach($filter_column as $key => $column){
        if(isset($_POST[$column])){

            $filterData = implode("','", $_POST[$column]);

            $sqlQuery .= "
                    AND $column IN('".$filterData."')";
            
            foreach($_POST[$column] as $key_true_filter => $name_true_filter){
                array_push($column_true_filter, $name_true_filter);
            }
        }
    }

    $sqlQuery .= "LIMIT $limit OFFSET $offset";
    $result = getData($sqlQuery);
}

if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['btn-del-filter'])){
    $sqlQuery = "SELECT * FROM bikeinfo WHERE status = '1' LIMIT $limit OFFSET $offset";

    $result = getData($sqlQuery);
}

// При переходе с главной с нажатием по категории
if($_SERVER['REQUEST_METHOD'] === 'GET' and isset($_GET['category'])){
    $sqlQuery = "SELECT * FROM bikeinfo WHERE status = '1'";

    $category = $_GET['category'];

    $sqlQuery .= "
            AND category LIKE '$category'";
    
    array_push($column_true_filter, $category);

    $sqlQuery .= "LIMIT $limit OFFSET $offset";

    $result = getData($sqlQuery);
}

?>