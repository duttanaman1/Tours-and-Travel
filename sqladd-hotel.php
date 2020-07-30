<?php
include("header.php");
include("connect.php");

if ($_POST['submit'] != null) {
    $id = $_POST['tripid'];
    $name = $_POST['name'];
    $price = $_POST['price'];
    if (mysqli_query($con, "INSERT INTO hotel VALUES(null,'$id','$name','$price')")) {
        header("location:http://localhost/travel/viewadmin-trip.php");
    } else
        echo "ERROR";
}
