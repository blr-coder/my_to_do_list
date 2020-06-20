<?php

include('../database_connection.php');

$name = $_POST['name'];
$email = $_POST['email'];
$password = $_POST['password'];
$confirm_password = $_POST['confirm_password'];

if(empty($name) || empty($email) || empty($password)) {
    $_SESSION['message'] = 'Все поля формы являются обязательными';
    header('Location:  registration.php');
    exit();
} elseif ($password != $confirm_password) {
    $_SESSION['message'] = 'Пароли не совпадают';
    header('Location:  registration.php');
    exit();
} elseif (mb_strlen($password) < 3 || mb_strlen($password) > 20) {
    $_SESSION['message'] = 'Пароль должен сожержать от 3 до 20 символов';
    header('Location:  registration.php');
    exit();
}


$password = MD5($_POST['password']);
$query = "INSERT INTO users (name, email, password) VALUES ('$name', '$email', '$password')";

$statement = $conn->prepare($query);
$statement->execute();

header('Location: authorization.php ');
