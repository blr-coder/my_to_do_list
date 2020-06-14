<?php

include('database_connection.php');

if(!empty($_POST['new_task'])) {
    $user_id = $_SESSION["user_id"];
    $task = $_POST['new_task'];

    $query = "INSERT INTO tasks (user_id, details) VALUES ($user_id, '$task')";

    $statement = $conn->prepare($query);
    $statement->execute();

    header('Location: index.php ');

} else {
    echo 'new_task is null!';
}
