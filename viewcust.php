<?php
include('connect.php');
include('header.php');


?>
<nav class="navbar navbar-expand-sm bg-info navbar-dark ">
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" href="viewcust.php">HOME</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="viewcust-book.php">Bookings</a>
        </li>
    </ul>
</nav>
<div class="container my-3">
    <div id="accordion">
        <?php
        $sqltrip = mysqli_query($con, "SELECT* FROM trip");
        if (mysqli_num_rows($sqltrip) > 0) {
            while ($trip = mysqli_fetch_assoc($sqltrip)) {
                $id = $trip['tripid'];
                $name = $trip['name'];
                $desp = $trip['desp']; ?>
                <div class="card">
                    <div class="card-header" id="headingTwo">
                        <h5 class="mb-0">
                            <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#<?php echo 'tripid' . $id; ?>" aria-expanded="false" aria-controls="collapseTwo">
                                <?php echo $name; ?>
                            </button>
                        </h5>
                    </div>
                    <div id="<?php echo 'tripid' . $id; ?>" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
                        <div class="card-body">
                            <p class="mb-2"><?php echo $desp; ?></p>
                            <form action="sqlbook.php" method="post" class="w-50">
                                <input type="hidden" name="tripid" value="<?php echo $id; ?>">
                                Customer Name:
                                <input type="text" name="name" class="form-control"><br>
                                Start Date:
                                <input type="date" name="date" id="" class="form-control"><br>
                                Total number of days:
                                <input type="number" name="days" id="" class="form-control"><br>
                                SELECT HOTEL:
                                <select name="hotelid" id="" class="form-control">
                                    <?php
                                    $sqlhotel = mysqli_query($con, "SELECT * FROM hotel where tripid='$id'");
                                    while ($hotel = mysqli_fetch_assoc($sqlhotel)) {
                                        $hotelid = $hotel['id'];
                                        $hotelname = $hotel['name'];
                                        $hotelprice = $hotel['price'];
                                    ?>
                                        <option value="<?php echo $hotelid; ?>">
                                            <?php echo $hotelname; ?> ---------- Rs:<?php echo $hotelprice; ?>
                                        </option>
                                    <?php
                                    }
                                    ?>
                                </select><br>
                                SELECT Transport:
                                <select name="transid" id="" class="form-control">
                                    <?php
                                    $sqltrans = mysqli_query($con, "SELECT * FROM transport where tripid='$id'");
                                    while ($trans = mysqli_fetch_assoc($sqltrans)) {
                                        $transid = $trans['id'];
                                        $transname = $trans['name'];
                                        $transprice = $trans['price'];
                                    ?>
                                        <option value="<?php echo $transid; ?>">
                                            <?php echo $transname; ?> ---------- Rs:<?php echo $transprice; ?>
                                        </option>
                                    <?php
                                    }
                                    ?>
                                </select><br>
                                <br>
                                <input type="submit" value="BOOK" name="submit" class="btn btn-info">
                            </form>
                        </div>
                    </div>
                </div>
        <?php
            }
        } ?>
    </div>

</div>