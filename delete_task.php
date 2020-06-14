<?php

include('database_connection.php');

$task_id = $_POST['task_id'];

$query = "DELETE FROM tasks WHERE id = $task_id";

$statement = $conn->prepare($query);
$statement->execute();

header('Location: index.php ');
