<?php
require('connect.php');

if ($_POST['submit'] != NULL) {

    $name = $_POST['name'];
    $password = $_POST['password'];


    echo 1;
    $_SESSION['name'] = $name;
    if (mysqli_query($con, "INSERT INTO emp VALUES (NULL,'$name','$password')")) {

        header("Location:http://localhost/travel/viewadmin.php");
    } else {
        echo "Error";
    }
}
