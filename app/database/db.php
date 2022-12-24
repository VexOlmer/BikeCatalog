<?php

session_start();
require('connect.php');

function test($value){
    echo '<pre>';
    print_r($value);
    echo '</pre>';
}

// Проверка на ошибки при SQL запросах
function dbCheckError($querry){
    $errorInfo = $querry->errorInfo();

    if ($errorInfo[0] != PDO::ERR_NONE){
        echo $errorInfo[2];
        exit();
    }
    return true;
}

// Получение всех данных одной таблицы, с возможными параметрами
function selectAll($table, $params = []){
    global $pdo;

    $sql = "SELECT * FROM $table";

    if(!empty($params)){
        $i = 0;
        foreach ($params as $key => $value){
            if (!is_numeric($value)){
                $value = "'".$value."'";
            }
            if ($i === 0){
                $sql = $sql . " WHERE $key=$value";
            }
            else{
                $sql = $sql . " AND $key=$value";
            }
            $i++;
        }
    }

    $querry = $pdo->prepare($sql);
    $querry->execute();

    dbCheckError($querry);

    return $querry->fetchAll();
}

// Получение 1 строки данных из таблицы
function selectOne($table, $params = []){
    global $pdo;

    $sql = "SELECT * FROM $table";

    if(!empty($params)){
        $i = 0;
        foreach ($params as $key => $value){
            if (!is_numeric($value)){
                $value = "'".$value."'";
            }
            if ($i === 0){
                $sql = $sql . " WHERE $key=$value";
            }
            else{
                $sql = $sql . " AND $key=$value";
            }
            $i++;
        }
    }
    $sql = $sql . " LIMIT 1";

    $querry = $pdo->prepare($sql);
    $querry->execute();

    dbCheckError($querry);

    return $querry->fetch();
}

// Запись в таблицу БД
function insert($table, $params){
    global $pdo;
    $i = 0;
    $coll = '';
    $mask = '';

    foreach ($params as $key => $value) {
        if ($i === 0){
            $coll = $coll . "$key";
            $mask = $mask . "'" ."$value" . "'";
        }else {
            $coll = $coll . ", $key";
            $mask = $mask . ", '" . "$value" . "'";
        }
        $i++;
    }

    $sql = "INSERT INTO $table ($coll) VALUES ($mask)";

    $query = $pdo->prepare($sql);
    $query->execute();
    dbCheckError($query);

    return $pdo->lastInsertId();
}

// Обновление строки в таблице по Id
function update($table, $id, $params){
    global $pdo;
    $i = 0;
    $str = '';

    foreach ($params as $key => $value) {
        if ($i === 0){
            $str = $str . $key . " = '" . $value . "'";
        }else {
            $str = $str .", " . $key . " = '" . $value . "'";
        }
        $i++;
    }

    $sql = "UPDATE $table SET $str WHERE ID = $id";
    $query = $pdo->prepare($sql);
    $query->execute();
    dbCheckError($query);
}

// Удаление строки в таблице
function delete($table, $id){
    global $pdo;

    $sql = "DELETE FROM $table WHERE ID = $id";
    $query = $pdo->prepare($sql);
    $query->execute();
    dbCheckError($query);
}

// ----------------------------------------------------------------
// Функции для работы фильтра

function getData($sql){
    global $pdo;

    $querry = $pdo->prepare($sql);
    $querry->execute();

    dbCheckError($querry);

    return $querry->fetchall();
}

// Получение уникальный значений для нужного столбца
function getColumn($column){
    $query = "
        SELECT DISTINCT($column)
        FROM bikeinfo";
    return  getData($query);
}

// "category", "type", "destination", "level", "season"
// Выдает продукты по параметрам поиска
function searchBike(){
    $sqlQuery = "SELECT * FROM bikeinfo WHERE BID != '0'";

    if(isset($_POST["category"])) {
        $FilterData = implode("','", $_POST["category"]);
        $sqlQuery .= "
        AND category IN(' ".$FilterData."')";
    }
    
    $query .= " ORDER By price";
    
    echo getData($query);
}	

?>