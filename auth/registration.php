<?php
session_start();
if (!empty($_SESSION["user_id"])) {
    header('Location: ../index.php ');
}
 ?>


<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <title>register</title>
</head>
<body>
    <h1 align="center">Регистрация</h1>

    <div class="container">
        <form action="register.php" method="POST">
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" class="form-control" id="name" name="name">
            </div>
            <div class="form-group">
                <label for="email">E-mail</label>
                <input type="email" class="form-control" id="email" name="email">
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" class="form-control" id="password" name="password">
            </div>
            <div class="form-group">
                <label for="confirm_password">confirm Password</label>
                <input type="password" class="form-control" id="confirm_password" name="confirm_password">
            </div>
            
            <button type="submit" class="btn btn-primary">Register</button>
        </form>
        <br>
        <div>Уже есть аккаунт в нашем чудо приложении? <a href="authorization.php">Авторизуйтесь!</a></div>

        <?php if(!empty($_SESSION['message'])): ?>
            <div class="alert alert-danger my-3" role="alert">
            <?= $_SESSION['message'] ?>
          </div>
        <?php endif ?>

        <?php unset($_SESSION['message']) ?>

    </div>
    
</body>
</html>