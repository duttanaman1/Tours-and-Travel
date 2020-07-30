<?php
include("header.php");
include("connect.php");

?>
<nav class="navbar navbar-expand-sm bg-dark navbar-dark ">
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" href="viewadmin.php">HOME</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="viewadmin-trip.php">Trip</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="viewadmin-records.php">records</a>
        </li>
    </ul>
</nav>
<div class="container my-3">
    <div class="card w-75">
        <div class="card-header">
            Employee Registration
        </div>
        <div class="card-body w-50 px-5 mx-5">
            <form action="sqlregister-emp.php" method="post" class="mx-auto">

                Employee name:
                <input type="text" name="name" id="" class="form-control"><br>
                Employee password:
                <input type="text" name="password" id="" class="form-control"><br>
                <br>
                <br>
                <input type="submit" value="Register" name="submit" class="btn btn-primary">
            </form>
        </div>
    </div>
</div>