<?php

include('database_connection.php');

if (empty($_SESSION["user_id"])) {
    /// redirect to auth page...
}

$query = "SELECT * FROM tasks WHERE user_id = '".$_SESSION["user_id"]."' ORDER BY id DESC";

$statement = $conn->prepare($query);
$statement->execute();
$result = $statement->fetchAll();

?>


<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="css/bootstrap.min.css">

    <title>To Do List</title>
  </head>
  <body>
    

    <div class="container my-2">
        <div class="card">
            <div class="card-header">
                my simple TO DO LIST
            </div>
            <div class="card-body">                 
                <form method="post" action="add_task.php">
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" placeholder="Enter a new task" name="new_task">

                        <div class="input-group-append">
                            <button class="btn btn-outline-primary" type="submit">Add</button>
                        </div>
                    </div>
                </form>

                <?php if(!empty($_SESSION['error'])): ?>
                    <div class="alert alert-danger my-3" role="alert">
                        <?= $_SESSION['error'] ?>
                    </div>
                <?php endif ?>

                <?php unset($_SESSION['error']) ?>

            </div>
        </div>

        <h3 align="center">Tasks list:</h3>

        <div>
            <?foreach($result as $row) {?>
                <?if($row['status'] == 'no') {?>
                    <div class="alert alert-secondary row" role="alert">
                        <div class="col-1"><strong><?=$row['id']?></strong> </div> 
                        <div class="col-10"><?=$row['details']?></div>
                        
                        <div class="col-1">
                            <form action="done_task.php" method="post">
                                <input type="hidden" name="task_id" value="<?=$row['id']?>">
                                <button type="submit" class="btn btn-success btn-sm">Done</button>
                            </form>
                        </div>

                    </div>
                <?} else {?>
                    <div class="alert alert-primary row" role="alert">
                        <div class="col-1"><strong><?=$row['id']?></strong> </div> 
                        <div class="col-10"><strike><?=$row['details']?></strike></div>

                        <div class="col-1">
                            <form action="delete_task.php" method="post">
                                <input type="hidden" name="task_id" value="<?=$row['id']?>">
                                <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                            </form>
                        </div>

                    </div>
                <?}?>
            <?}?>

        </div>

    </div>

  </body>
</html>
