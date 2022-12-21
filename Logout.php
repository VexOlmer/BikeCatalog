<?php
session_start();

include "config.php";

unset($_SESSION['id']);
unset($_SESSION['login']);
unset($_SESSION['admin']);


header('location: ' . BASE_URL . 'Login.php');
?>