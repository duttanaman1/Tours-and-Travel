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
    <div class="card">
        <div class="card-header">
            <h2>ADD Trip</h2>
        </div>
        <div class="card-body row">
            <div class="col-md-5">
                <form action="sqladd-trip.php" method="POST" class="">
                    Name:
                    <input type="text" class="form-control" name="name">
                    Description:
                    <textarea name="desp" id="" cols="50" rows="5" class="form-control"></textarea>
                    <br>
                    <input type="submit" value="Submit" name="submit" class="btn btn-info">
                </form>
            </div>
            <div class="col-md-6">
                <table class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th scope="col">id</th>
                            <th scope="col">name</th>
                            <th scope="col">Transport</th>
                            <th scope="col">Hotel</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $sqltrip = mysqli_query($con, "SELECT* FROM trip");
                        if (mysqli_num_rows($sqltrip) > 0) {
                            while ($trip = mysqli_fetch_assoc($sqltrip)) {
                                $id = $trip['tripid'];
                                $name = $trip['name'];
                                $desp = $trip['desp'];
                        ?>
                                <tr>
                                    <th scope="row"><?php echo $id; ?></th>
                                    <td><?php echo $name; ?></td>
                                    <td>
                                        <form action="add-transport.php" method="post">
                                            <input type="hidden" name="tripid" value="<?php echo $id; ?>">
                                            <input type="submit" value="ADD" class="btn btn-success" name="submit">
                                        </form>
                                    </td>
                                    <td>
                                        <form action="add-hotel.php" method="post">
                                            <input type="hidden" name="tripid" value="<?php echo $id; ?>">
                                            <input type="submit" value="ADD" name="submit" class="btn btn-success">
                                        </form>
                                    </td>

                                </tr>
                        <?php
                            }
                        }
                        ?>

                    </tbody>
                </table>
            </div>

            <br>
            <br>

        </div>
    </div>
    <div class="card my-3">
        <div class="card-header">
            <h2>change in trips</h2>
        </div>
        <div class="card-body">
            <div class="list-group">
                <?php
                $sqltrip = mysqli_query($con, "SELECT* FROM trip");
                if (mysqli_num_rows($sqltrip) > 0) {
                    while ($trip = mysqli_fetch_assoc($sqltrip)) {
                        $id = $trip['tripid'];
                        $name = $trip['name'];
                ?>

                        <div href="#" class="list-group-item list-group-item-action flex-column align-items-start">
                            <div class="d-flex w-100 justify-content-between">
                                <h5 class="mb-1"><?php echo $name; ?></h5>

                            </div>
                            <div class="row">
                                <div class="col-md-6">

                                    <table class="table table-sm table-hover table-bordered">
                                        <caption>Transport</caption>
                                        <thead>
                                            <tr>
                                                <th scope="col">ID</th>
                                                <th scope="col">Name</th>
                                                <th scope="col">Price</th>
                                                <th scope="col"></th>
                                                <th scope="col"></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $sqltrans = mysqli_query($con, "SELECT* FROM transport where tripid='$id'");
                                            if (mysqli_num_rows($sqltrans) > 0) {
                                                while ($trans = mysqli_fetch_assoc($sqltrans)) {
                                                    $transid = $trans['id'];
                                                    $name = $trans['name'];
                                                    $price = $trans['price']; ?>
                                                    <tr>
                                                        <th scope="row"><?php echo $transid; ?></th>
                                                        <td><?php echo $name; ?></td>
                                                        <td><?php echo $price; ?></td>
                                                        <td>
                                                            <form action="updtrans.php" method="post">
                                                                <input type="hidden" name="transid" value="<?php echo $transid; ?>">
                                                                <input type="submit" value="Update" name="submit" class="btn btn-warning">
                                                            </form>
                                                        </td>
                                                        <td>
                                                            <form action="sqldelete-trans.php" method="post">
                                                                <input type="hidden" name="transid" value="<?php echo $transid; ?>">
                                                                <input type="submit" value="delete" name="submit" class="btn btn-danger">
                                                            </form>
                                                        </td>
                                                    </tr>
                                            <?php
                                                }
                                            } ?>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="col-md-6">
                                    <table class="table table-sm table-hover table-bordered">
                                        <caption>hotel</caption>
                                        <thead>
                                            <tr>
                                                <th scope="col">ID</th>
                                                <th scope="col">Name</th>
                                                <th scope="col">Price</th>
                                                <th scope="col"></th>
                                                <th scope="col"></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $sqlhotel = mysqli_query($con, "SELECT* FROM hotel where tripid='$id'");
                                            if (mysqli_num_rows($sqlhotel) > 0) {
                                                while ($hotel = mysqli_fetch_assoc($sqlhotel)) {
                                                    $hotelid = $hotel['id'];
                                                    $name = $hotel['name'];
                                                    $price = $hotel['price']; ?>
                                                    <tr>
                                                        <th scope="row"><?php echo $hotelid; ?></th>
                                                        <td><?php echo $name; ?></td>
                                                        <td><?php echo $price; ?></td>
                                                        <td>
                                                            <form action="updhotel.php" method="post">
                                                                <input type="hidden" name="hotelid" value="<?php echo $hotelid; ?>">
                                                                <input type="submit" value="Update" name="submit" class="btn btn-warning">
                                                            </form>
                                                        </td>
                                                        <td>
                                                            <form action="sqldelete-hotel.php" method="post">
                                                                <input type="hidden" name="hotelid" value="<?php echo $hotelid; ?>">
                                                                <input type="submit" value="delete" name="submit" class="btn btn-danger">
                                                            </form>
                                                        </td>
                                                    </tr>
                                            <?php
                                                }
                                            } ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                <?php
                    }
                }
                ?>

            </div>
        </div>
    </div>
</div>