<?php

if(!$_SESSION){
    header('location:' . BASE_URL . 'Login.php');
}

$all_bikes = selectAll('bikeinfo');
$all_brands = selectAll('brands');

$errMsg = '';
$id = '';

// Обновление логотипа компании
if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['edit_brand_img'])){

    $company = selectOne('brands', ['BRANDS_ID' => $_POST['id']]);

    if (!empty($_FILES['img']['name'])){
        $img_name = trim($company['name_company']) . '.' . end(explode(".", $_FILES['img']['name']));
        $file_tmp_name = $_FILES['img']['tmp_name'];
        $file_path = ROOT_PATH . "\static\img\brands\\" . $img_name;

        unlink($file_path);

        $result = move_uploaded_file($file_tmp_name, $file_path);

        if (!$result){
            $errMsg = "Ошибка загрузки изображения на сервер!";
        }
        header('location: ' . BASE_URL . 'admin/images/brands.php');
    }
    else{
        $errMsg = "Ошибка при получении изображения!";
    }
}

// Обновление логотипа компании
if($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['id'])){

    $id = $_GET['id'];
    $brands = selectOne('brands', ['BRANDS_ID' => $id]);
    
    $name = $brands['name_company'];
}

// Обновление логотипа компании
if($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['id_bike'])){

    $id = $_GET['id_bike'];
    $bike = selectOne('bikeinfo', ['BIKE_ID' => $id]);
    
    $name = $bike['name'];
}

// Обновление логотипа компании
if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['edit_bikes_img'])){

    test($_POST);
    test($_FILES);

    $bike = selectOne('bikeinfo', ['BIKE_ID' => $_POST['id']]);
    $count = $_POST['count_img'];

    if (!empty($_FILES['img_main']['name'])){
        $img_name = 'main' . '.' . end(explode(".", $_FILES['img_main']['name']));
        $file_tmp_name = $_FILES['img_main']['tmp_name'];
        $file_path = ROOT_PATH . "\static\img\bikes_db\\" . trim($bike['name']) . "\\" . $img_name;

        unlink($file_path);

        $result = move_uploaded_file($file_tmp_name, $file_path);

        if (!$result){
            $errMsg = "Ошибка загрузки изображения на сервер!";
        }
    }

    for ($i = 1; $i < $count; $i++){
        if (!empty($_FILES['img_' . $i]['name'])){
            $img_name = $i . '.' . end(explode(".", $_FILES['img_' . $i]['name']));
            $file_tmp_name = $_FILES['img_' . $i]['tmp_name'];
            $file_path = ROOT_PATH . "\static\img\bikes_db\\" . trim($bike['name']) . "\\" . $img_name;
    
            unlink($file_path);
    
            $result = move_uploaded_file($file_tmp_name, $file_path);
    
            if (!$result){
                $errMsg = "Ошибка загрузки изображения на сервер!";
            }
        }
    }

    if (!empty($_FILES['img_add_new']['name'])){

        foreach($_FILES['img_add_new']['name'] as $key => $value){

            $img_name = $count . '.' . end(explode(".", $value));

            $file_tmp_name = $_FILES['img_add_new']['tmp_name'][$key];
            $file_path = ROOT_PATH . "\static\img\bikes_db\\" . trim($bike['name']) . "\\" . $img_name;

            $count += 1;

            $result = move_uploaded_file($file_tmp_name, $file_path);

            if (!$result){
                $errMsg = "Ошибка загрузки изображения на сервер!";
            }
        }
    }

    header('location: ' . BASE_URL . 'admin/images/bikes.php');
}


// $num_img = 0;
// mkdir(ROOT_PATH . "\static\img\bikes_db\\" . trim($_POST['name']));

// foreach($_FILES['img']['name'] as $key => $value){

//     if ($num_img === 0){
//         $img_name = 'main.' . end(explode(".", $value));
//     }
//     else{
//         $img_name = $num_img . '.' . end(explode(".", $value));
//     }

//     $file_tmp_name = $_FILES['img']['tmp_name'][$key];
//     $file_path = ROOT_PATH . "\static\img\bikes_db\\" . trim($_POST['name']) . "\\" . $img_name;

//     $num_img += 1;

//     $result = move_uploaded_file($file_tmp_name, $file_path);

//     if (!$result){
//         $errMsg = "Ошибка загрузки изображения на сервер!";
//     }
// }


?>