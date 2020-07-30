<?php
require('connect.php');
session_start();
if ($_POST['submit'] != NULL) {
    $name = $_POST['name'];
    $password = $_POST['password'];
    if (mysqli_query($con, "INSERT INTO admin VALUES (NULL,'$name','$password'); ")) {
        header("Location:http://localhost/travel/viewsuperadmin.php");
    } else {
        echo "Error";
    }
}
