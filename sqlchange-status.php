<?php
include('connect.php');
if ($_POST['submit'] != null) {
    $bookid = $_POST['bookid'];
    if (mysqli_query($con, "UPDATE book SET status='paid' WHERE bookid='$bookid'")) {
        header("location: http://localhost/travel/viewadmin-records.php");
    } else
        echo "ERROR";
}
