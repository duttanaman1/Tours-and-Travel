<?php
require('connect.php');
include('header.php');

if ($_POST['user_login'] != NULL) {
    $name = $_POST['name'];
    $password = $_POST['password'];

    $_SESSION['cust'] = $name;
    echo $_SESSION['cust'];


    if (mysqli_num_rows(mysqli_query($con, "SELECT * FROM cust WHERE name='$name' AND password = '$password' ")) > 0) {

        header("Location: http://localhost/travel/viewcust.php");
    } else if (mysqli_num_rows(mysqli_query($con, "SELECT * FROM emp WHERE name='$name' AND password = '$password' ")) > 0) {

        header("Location: http://localhost/travel/viewemp.php");
    } else if (mysqli_num_rows(mysqli_query($con, "SELECT * FROM admin WHERE name='$name' AND password = '$password' ")) > 0) {

        header("Location:http://localhost/travel/viewadmin.php");
    } else if ($name == "superadmin" && $password == "superadmin") {
        header("Location: http://localhost/travel/viewsuperadmin.php");
    } else {
        echo "Error";
    }
}
