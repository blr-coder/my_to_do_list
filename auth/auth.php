<?php

include('../database_connection.php');

$name = $_POST['name'];
$password = MD5($_POST['password']);

$query = "SELECT * FROM users WHERE name='$name' AND password='$password'";

$statement = $conn->prepare($query);
$statement->execute();

$user = $statement->fetchAll();

if(!empty($user))
{
    $_SESSION["user_id"] = $user[0]['id'];
    header('Location: ../index.php ');
} else {
    $_SESSION['message'] = 'Такой пользователь не найден';
    header('Location:  authorization.php');
}
