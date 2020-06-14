<?php

include('database_connection.php');

$task_id = $_POST['task_id'];

$query = "UPDATE tasks SET status = 'yes' WHERE id = $task_id";

$statement = $conn->prepare($query);
$statement->execute();

header('Location: index.php ');
