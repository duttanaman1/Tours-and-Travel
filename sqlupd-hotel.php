<?php
include('connect.php');
if ($_POST['submit'] != null) {
    $hotelid = $_POST['hotelid'];
    $price = $_POST['price'];
    if (mysqli_query($con, "UPDATE hotel SET price='$price' where id='$hotelid'")) {
        header("location:http://localhost/travel/viewadmin-trip.php");
    } else
        echo "ERROR";
}
