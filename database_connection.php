<?php

$conn = new PDO("mysql:host=localhost;dbname=todolist", "root", "");

session_start();

$_SESSION["user_id"] = "1";
