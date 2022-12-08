<?php

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


// Вставка данных в таблицу
function insert($table){
    global $pdo;
    
    // INSERT INTO 'favorites' (UID, BID) VALUES ('1', ['2', '3']);
    //             'compares' (UID, BID) VALUES ('1', ['2', '3']);
    //             'users' (admin, username, email, password) VALUES ('0', 'eolmer', 'dan@gmail.com', '1234');
}


// Обновление строки в таблице
function update($table){

}


// Удаление строки в таблице
function delete($table){
    
}

$params = [
    'Name' => 'Jamis',
];
// test(selectAll('brands', $params));
test(selectOne('brands'));

?>