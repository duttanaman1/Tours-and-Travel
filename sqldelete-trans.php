<?php
include('connect.php');
if ($_POST['submit'] != null) {
    $id = $_POST['transid'];
    if (mysqli_query($con, "DELETE FROM transport where id=$id")) {
        header('location:http://localhost/travel/viewadmin-trip.php');
    } else
        echo "ERROR";
}
