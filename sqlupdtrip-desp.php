<?php
include('connect.php');
include('header.php');
if ($_POST['submit'] != null) {
    $id = $_POST['tripid'];
    $desp = $_POST['desp'];
    echo $desp;
    echo $id;
    if (mysqli_query($con, "UPDATE trip SET desp='$desp' where tripid='$id'")) {
        header('location:http://localhost/travel/viewemp.php');
    } else
        echo "ERROR";
}
