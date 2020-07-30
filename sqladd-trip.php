<?php
include('connect.php');
if ($_POST['submit'] != null) {
    $name = $_POST['name'];
    $desp = $_POST['desp'];
    if (mysqli_query($con, "INSERT INTO trip VALUES(null,'$name','$desp')")) {
        header("location: http://localhost/travel/viewadmin-trip.php");
    } else
        echo "ERROR";
}
