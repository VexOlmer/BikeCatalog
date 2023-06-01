<?php

session_start();
require_once('connect.php');

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

function getData($sql){
    global $pdo;

    $querry = $pdo->prepare($sql);
    $querry->execute();

    dbCheckError($querry);

    return $querry->fetchall();
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

    return getData($sql);
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


// ----------------------------------------------------------------
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
    $name_id = $params['ID'];
    unset($params['ID']);

    foreach ($params as $key => $value) {
        if ($i === 0){
            $str = $str . $key . " = '" . $value . "'";
        }else {
            $str = $str .", " . $key . " = '" . $value . "'";
        }
        $i++;
    }

    $sql = "UPDATE $table SET $str WHERE $name_id = $id";
    $query = $pdo->prepare($sql);
    $query->execute();
    dbCheckError($query);
}

// Удаление строки в таблице
function delete($table, $id, $name_ID){
    global $pdo;

    $sql = "DELETE FROM $table WHERE $name_ID = $id";
    $query = $pdo->prepare($sql);
    $query->execute();
    dbCheckError($query);
}

// ----------------------------------------------------------------
// Функции для работы фильтра

// Получение уникальный значений для нужного столбца
function getColumn($table, $column){
    $query = "
        SELECT DISTINCT($column)
        FROM $table";
    return getData($query);
}

function countRow($table){
    $query = "SELECT COUNT(*) FROM $table WHERE status LIKE '1'";
    return getData($query);
}

?>