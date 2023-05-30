<?php

if(!$_SESSION){
    header('location:' . BASE_URL . 'Login.php');
}

$all_bikes = selectAll('bikeinfo');
$all_company = selectAll('brands');

$errMsg = '';
$id = '';
$bike_edit = '';
$tech_edit = '';

// Добавление велосипеда
if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['create_bikes'])){

    if (!empty($_FILES['img']['name'])){

        $num_img = 0;
        mkdir(ROOT_PATH . "\static\img\bikes_db\\" . trim($_POST['name']));

        foreach($_FILES['img']['name'] as $key => $value){

            if ($num_img === 0){
                $img_name = 'main.' . end(explode(".", $value));
            }
            else{
                $img_name = $num_img . '.' . end(explode(".", $value));
            }

            $file_tmp_name = $_FILES['img']['tmp_name'][$key];
            $file_path = ROOT_PATH . "\static\img\bikes_db\\" . trim($_POST['name']) . "\\" . $img_name;

            $num_img += 1;

            $result = move_uploaded_file($file_tmp_name, $file_path);

            if (!$result){
                $errMsg = "Ошибка загрузки изображения на сервер!";
            }
        }
    }
    else{
        $errMsg = "Ошибка при получении изображения!";
    }

    $name_bike_column = array(
        "category", "name", "description", "BID", "type", "destination", "level", "season"
    );
    $name_tech_column = array(
        "frame_material", "frame", "wheel_mount", "fork_design", "fork", "front_hub", "rear_hub",
        "rims", "steering_wheel", "number_speeds", "rear_derailleur", "front_derailleur",
        "cassette", "carriage", "system", "shifters", "tires", "brake_type", "front_brake",
        "rear_brake", "pedals", "seatpost", "saddle", "wheel_size"
    );

    $bike = array();
    $tech = array();
    
    if (isset($_POST['status'])){
        $bike['status'] = $_POST['status'];
    }
    else{
        $bike['status'] = 0;
    }

    // Проверка на пустые поля и заполнение params для insert
    $clear_cell = false;
    foreach ($name_bike_column as $value){
        if($_POST[$value] === ''){
            $clear_cell = true;
            // break;
        }
        else{
            $bike[$value] = trim($_POST[$value]);
        }
    }
    foreach ($name_tech_column as $value){
        if($_POST[$value] === ''){
            $clear_cell = true;
            break;
        }
        else{
            $tech[$value] = trim($_POST[$value]);
        }
    }

    if($errMsg != ''){
    }
    elseif($clear_cell){
        $errMsg = "Не все поля заполнены!";
    }
    // elseif(gettype($_POST['number_speeds'] === 'string') || gettype($_POST['wheel_size'] === 'string')){
    //     $errMsg = "Поле кол-во скоростей или размер колеса имеют не правильный формат!";
    // }
    else{
        $id_last_tech = insert('tech_spec', $tech);
        $bike['tech'] = $id_last_tech;

        $id_last_bike = insert('bikeinfo', $bike);
        update('tech_spec', $id_last_tech, ['BIKE_ID' => $id_last_bike, 'ID' => 'id_tech']);

        header('location: ' . BASE_URL . 'admin/bikes/index.php');
    }
}

// Удаление информации о велосипеде
if($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['delete_id'])){

    $id_bike = trim($_GET['delete_id']);
    $del_bike = selectOne('bikeinfo', ['BIKE_ID' => $id_bike]);
    $name = $del_bike['name'];
    $id_tech = $del_bike['tech'];

    delete('bikeinfo', $id_bike, 'BIKE_ID');
    delete('tech_spec', $id_tech, 'id_tech');

    $errMsg = "Велосипед $name был удален!";
    header('location: ' . BASE_URL . 'admin/bikes/index.php');
}

// Обновить status велосипеда, где publis_id -> id велика, если нажатие, значит status меняем
if($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['publish_id'])){

    $id_bike = $_GET['publish_id'];
    $bike = selectOne('bikeinfo', ['BIKE_ID' => $id_bike]);

    if ($bike['status']){
        $new_status = 0;
    }
    else{
        $new_status = 1;
    }

    update('bikeinfo', $id_bike, ['ID' => 'BIKE_ID', 'status' => $new_status]);

    header('location: ' . BASE_URL . 'admin/bikes/index.php');
}

// Обновление информации о велосипеде
if($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['id'])){

    $id = $_GET['id'];
    $bike_edit = selectOne('bikeinfo', ['BIKE_ID' => $id]);
    $tech_edit = selectOne('tech_spec', ['id_tech' => $bike_edit['tech']]);
}

// Обновление данных о велосипеде
if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['edit_bikes'])){

    $id_bike = $_POST['id'];
    $id_tech = selectOne('tech_spec', ['BIKE_ID' => $id_bike])['id_tech'];

    $name_bike_column = array(
        "category", "name", "description", "BID", "type", "destination", "level", "season"
    );
    $name_tech_column = array(
        "frame_material", "frame", "wheel_mount", "fork_design", "fork", "front_hub", "rear_hub",
        "rims", "steering_wheel", "number_speeds", "rear_derailleur", "front_derailleur",
        "cassette", "carriage", "system", "shifters", "tires", "brake_type", "front_brake",
        "rear_brake", "pedals", "seatpost", "saddle", "wheel_size"
    );

    $bike = array();
    $tech = array();

    if (isset($_POST['status'])){
        $bike['status'] = 1;
    }
    else{
        $bike['status'] = 0;
    }

    // Проверка на пустые поля и заполнение params для insert
    $clear_cell = false;
    foreach ($name_bike_column as $value){
        if($_POST[$value] === ''){
            $clear_cell = true;
            break;
        }
        else{
            $bike[$value] = trim($_POST[$value]);
        }
    }
    foreach ($name_tech_column as $value){
        if($_POST[$value] === ''){
            $clear_cell = true;
            break;
        }
        else{
            $tech[$value] = trim($_POST[$value]);
        }
    }

    $bike['ID'] = 'BIKE_ID';
    $tech['ID'] = 'id_tech';

    if($clear_cell){
        $errMsg = "Не все поля заполнены!";
    }
    // elseif(gettype($_POST['number_speeds'] === 'string') || gettype($_POST['wheel_size'] === 'string')){
    //     $errMsg = "Поле кол-во скоростей или размер колеса имеют не правильный формат!";
    // }
    else{
        update('bikeinfo', $id_bike, $bike);
        update('tech_spec', $id_tech, $tech);

        header('location: ' . BASE_URL . 'admin/bikes/index.php');
    }

}

?>