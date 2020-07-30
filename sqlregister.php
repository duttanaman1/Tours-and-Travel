<?php
require('connect.php');
$path_filename_ext1 = "";
if ($_POST['submit'] != NULL) {

    $name = $_POST['name'];
    $password = $_POST['password'];
    $email = $_POST['email'];
    $mobile = $_POST['mobile'];
    $_SESSION['cust'] = $name;
    echo 1;
    $_SESSION['name'] = $name;
    if (mysqli_query($con, "INSERT INTO cust VALUES (NULL,'$name','$password','$email','$mobile',0)")) {

        header("Location:http://localhost/travel/viewcust.php");
    } else {
        echo "Error";
    }
}
