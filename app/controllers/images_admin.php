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

?>