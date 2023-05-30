<?php

if(!$_SESSION){
    header('location:' . BASE_URL . 'Login.php');
}

$all_users = selectAll('users');

$errMsg = '';
$id = '';
$username = '';
$email = '';
$admin = '';

// Удаление информации о пользователе
if($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['delete_id'])){

    $id_user = trim($_GET['delete_id']);
    $name = selectOne('users', ['USER_ID' => $id_user])['username'];

    delete('users', $id_user, 'USER_ID');

    $errMsg = "Пользователь $name был удален!";
    header('location: ' . BASE_URL . 'admin/users/index.php');
}

// Добавление пользователя
if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['create_user'])){

    $admin = 0;
    $username = trim($_POST['username']);
    $email = trim($_POST['email']);
    $pass_first = trim($_POST['pass-first']);
    $pass_second = trim($_POST['pass-second']);

    if($username === '' || $email === '' || $pass_first === '' || $pass_second === ''){
        $errMsg = "Не все поля заполнены!";
    }
    elseif(mb_strlen($username, 'UTF8') < 2){
        $errMsg = "Логин должен быть более 2-х символов";
    }
    elseif($pass_first != $pass_second)
    {
        $errMsg = "Пароли в обеих полях должны соответствовать!";
    }
    else{
        $existence = selectOne('users', ['email' => $email]);
        
        if(gettype($existence) != 'boolean'){
            $errMsg = "Пользователь с такой почтой уже существует!";
        }
        else{
            $pass = password_hash($pass_first, PASSWORD_DEFAULT);
            if (isset($_POST['admin'])) $admin = 1;

            $user = [
                'admin' => $admin,
                'username' => $username,
                'email' => $email,
                'password' => $pass,
            ];

            $id = insert('users', $user);
            $user = selectOne('users', ['USER_ID' => $id] );
            
            header('location: ' . BASE_URL . 'admin/users/index.php');
        }
    }
}

// Удаление информации о пользователе
if($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['delete_id'])){

    $id = trim($_GET['delete_id']);
    $name = selectOne('users', ['USER_ID' => $id])['username'];

    delete('users', $id, 'USER_ID');
    $errMsg = "Пользователь $username был удален!";
    header('location: ' . BASE_URL . 'admin/users/index.php');
}

// Обновление информации о пользователе
if($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['id'])){

    $id = $_GET['id'];
    $user_edit = selectOne('users', ['USER_ID' => $id]);

    $username = $user_edit['username'];
    $email = $user_edit['email'];
    $admin = $user_edit['admin'];
}

// Обновление данных о пользователе
if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['edit_users'])){

    $id_user= $_POST['id'];

    $user = array();

    $id = trim($_POST['id']);
    $username = trim($_POST['username']);
    $email = trim($_POST['email']);
    $admin = isset($_POST['admin']) ? 1 : 0;

    $user['ID'] = 'USER_ID';
    $user['username'] = $username;
    $user['email'] = $email;
    $user['admin'] = $admin;

    if ($_POST['pass_first'] != '' and $_POST['pass_second'] != ''){
        $pass_first = $_POST['pass_first'];
        $pass_second = $_POST['pass_second'];
    }
    else{
        $pass_first = '';
        $pass_second = '';
    }

    if($user['username'] === '' || $user['email'] === ''){
        $errMsg = "Не все поля заполнены!";
    }
    elseif(mb_strlen($user['username'], 'UTF8') < 2){
        $errMsg = "Логин должен быть более 2-х символов";
    }
    elseif($pass_first != $pass_second)
    {
        $errMsg = "Пароли в обеих полях должны соответствовать!";
    }
    else{
        $existence = selectOne('users', ['email' => $user['email']]);
        
        if(gettype($existence) != 'boolean' && $existence['USER_ID'] != $id_user){
            $errMsg = "Пользователь с такой почтой уже существует!";
        }
        else{
            $pass = password_hash($pass_first, PASSWORD_DEFAULT);
            if (isset($_POST['admin'])) $user['admin'] = 1;

            $user['password'] = $pass;

            update('users', $id_user, $user);
            
            header('location: ' . BASE_URL . 'admin/users/index.php');
        }
    }

}


?>