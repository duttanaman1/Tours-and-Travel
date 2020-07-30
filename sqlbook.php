<?php
include('connect.php');
if ($_POST['submit']) {

    $tripid = $_POST['tripid'];
    $name = $_POST['name'];
    $date = $_POST['date'];
    $days = $_POST['days'];
    $hotelid = $_POST['hotelid'];
    $transid = $_POST['transid'];
    $hotel = mysqli_fetch_assoc(mysqli_query($con, "SELECT * FROM hotel where id='$hotelid'"));
    $trans = mysqli_fetch_assoc(mysqli_query($con, "SELECT * FROM transport where id='$transid'"));
    $hotelname = $hotel['name'];
    $transname = $trans['name'];
    $price = $days * $hotel['price'] + $trans['price'];
    echo  $tripid . "--" . $hotelid . "--" . $transid;

    if (mysqli_query($con, "INSERT INTO BOOK VALUES(null,'$tripid','$name','$date','$days','$hotelname','$transname','$price','booked')")) {
        header("location:http://localhost/travel/viewcust-book.php");
    } else
        echo "ERROR";
}
