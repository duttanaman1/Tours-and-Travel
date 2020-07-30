<?php
include('connect.php');
if ($_POST['submit'] != null) {
    $transid = $_POST['transid'];
    $price = $_POST['price'];
    if (mysqli_query($con, "UPDATE transport SET price='$price' where id='$transid'")) {
        header("location:http://localhost/travel/viewadmin-trip.php");
    } else
        echo "ERROR";
}
