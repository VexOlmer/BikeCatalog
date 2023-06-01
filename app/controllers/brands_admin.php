<?php

if(!$_SESSION){
    header('location:' . BASE_URL . 'Login.php');
}

$all_brands = selectAll('brands');
$errMsg = '';
$id = '';
$name = '';
$desc = '';

// Добавление компании
if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['create_brand'])){

    if (!empty($_FILES['img']['name'])){
        $img_name = trim($_POST['name']) . '.' . end(explode(".", $_FILES['img']['name']));
        $file_tmp_name = $_FILES['img']['tmp_name'];
        $file_path = ROOT_PATH . "\static\img\brands\\" . $img_name;

        $result = move_uploaded_file($file_tmp_name, $file_path);

        if (!$result){
            $errMsg = "Ошибка загрузки изображения на сервер!";
        }
    }
    else{
        $errMsg = "Ошибка при получении изображения!";
    }

    $name = trim($_POST['name']);
    $desc = trim($_POST['desc']);

    if($errMsg != ''){
    }
    elseif($name === '' || $desc === ''){
        $errMsg = "Не все поля заполнены!";
    }
    elseif(mb_strlen($name, 'UTF8') < 2){
        $errMsg = "Логин должен быть более 2-х символов";
    }
    else{
        $existence = selectOne('brands', ['name_company' => $name]);
        if(gettype($existence) != 'boolean'){
            $errMsg = "Такая компания уже существует!";
        }
        else{
            $post = [
                'name_company' => $name,
                'description_company' => $desc,
            ];
            $id = insert('brands', $post);
            $company = selectOne('brands', ['BRANDS_ID' => $id] );
            header('location: ' . BASE_URL . 'admin/brands/index.php');
        }
    }
}
else{
    $name = '';
    $desc = '';
}

// Обновление информации о бренде
if($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['id'])){

    $id = $_GET['id'];
    $brands = selectOne('brands', ['BRANDS_ID' => $id]);
    
    $name = $brands['name_company'];
    $desc = $brands['description_company'];
}

// Обновление данных о компании
if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['edit_brand'])){

    $id = trim($_POST['id']);
    $name = trim($_POST['name']);
    $desc = trim($_POST['desc']);

    if($name === '' || $desc === ''){
        $errMsg = "Не все поля заполнены!";
    }
    elseif(mb_strlen($name, 'UTF8') < 2){
        $errMsg = "Логин должен быть более 2-х символов";
    }
    else{
        $post = [
                'ID' => 'BRANDS_ID',
                'name_company' => $name,
                'description_company' => $desc,
        ];

        $company_id = update('brands', $id, $post);
        header('location: ' . BASE_URL . 'admin/brands/index.php');
        }
}

// Удаление информации о компании
if($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['delete_id'])){

    test($_GET);

    $id = trim($_GET['delete_id']);
    $name = selectOne('brands', ['BRANDS_ID' => $id])['name_company'];

    delete('brands', $id, 'BRANDS_ID');
    $errMsg = "Компания $name была удалена!!";
    header('location: ' . BASE_URL . 'admin/brands/index.php');
}

?>