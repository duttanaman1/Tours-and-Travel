<?php
include('connect.php');
if ($_POST['submit'] != null) {
    $id = $_POST['hotelid'];
    if (mysqli_query($con, "DELETE FROM hotel where id=$id")) {
        header('location:http://localhost/travel/viewadmin-trip.php');
    } else
        echo "ERROR";
}
