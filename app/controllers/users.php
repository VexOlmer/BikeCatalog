<?php

include("app/database/db.php");

$errMsg = '';  // Какая-либо ошибка при обработке данных

function userAuth($user){
    $_SESSION['id'] = $user['USER_ID'];
    $_SESSION['username'] = $user['username'];
    $_SESSION['admin'] = $user['admin'];
    header('location: ' . BASE_URL . "BikeInfo.php");
}

// Регистрация
if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['btn-reg'])){

    $admin = 0;
    $username = trim($_POST['username']);
    $email = trim($_POST['email']);
    $pass = trim($_POST['pass']);
    $passR = trim($_POST['pass-repeat']);

    $post = [
        'admin' => $admin,
        'username' => $username,
        'email' => $email,
        'password' => $pass
    ];

    if($username === '' || $email === '' || $pass === ''){
        $errMsg = "Не все поля заполнены!";
    }
    elseif(mb_strlen($username, 'UTF8') < 2){
        $errMsg = "Логин должен быть более 2-х символов";
    }
    elseif($pass !== $passR) {
        $errMsg = "Пароли в обеих полях должны соответствовать!";
    }
    else{
        $existence = selectOne('users', ['email' => $email]);
        if($existence['email'] === $email){
            $errMsg = "Пользователь с такой почтой уже зарегистрирован!";
        }
        else{
            $pass = password_hash($pass, PASSWORD_DEFAULT);
            $post = [
                'admin' => $admin,
                'username' => $username,
                'email' => $email,
                'password' => $pass
            ];
            $id = insert('users', $post);
            $user = selectOne('users', ['USER_ID' => $id] );
            userAuth($user);
        }
    }
}

// Авторизация
if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['btn-log'])){

    $email = trim($_POST['email']);
    $pass = trim($_POST['password']);

    if($email === '' || $pass === '') {
        $errMsg = "Не все поля заполнены!";
    }
    else{
        $existence = selectOne('users', ['email' => $email]);
        if($existence && password_verify($pass, $existence['password'])){
            userAuth($existence);
        }else{
            $errMsg = "Почта либо пароль введены неверно!";
        }
    }
}

?>