<?php
session_start();

require_once("config.php");

unset($_SESSION['id']);
unset($_SESSION['login']);
unset($_SESSION['admin']);
unset($_SESSION['username']);


header('location: ' . BASE_URL . 'Login.php');
?>