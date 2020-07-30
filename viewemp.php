<?php
include('connect.php');
include('header.php');
?>
<nav class="navbar navbar-expand-sm bg-info navbar-dark ">
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" href="viewemp.php">HOME</a>
        </li>

    </ul>
</nav>
<div class="container my-2">
    <div class="card">
        <div class="card-header">
            <h2>Trip Details</h2>
        </div>
        <div class="card-body ">


            <table class="table table-bordered table-hover w-100">
                <thead>
                    <tr>
                        <th scope="col">id</th>
                        <th scope="col">name</th>
                        <th scope="col">Description</th>
                        <th scope="col">Number of bookings</th>
                        <th scope="col"></th>
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
                                <td><?php echo $desp; ?></td>
                                <td>0<?php echo mysqli_num_rows(mysqli_query($con, "SELECT * FROM BOOK where tripid='$id'")) ?></td>
                                <td>
                                    <form action="updtrip-desp.php" method="post">
                                        <input type="hidden" name="tripid" value="<?php echo $id; ?>">
                                        <input type="submit" value="Update Description" class="btn btn-success" name="submit">
                                    </form>
                                </td>


                            </tr>
                    <?php
                        }
                    }
                    ?>

                </tbody>
            </table>


            <br>
            <br>

        </div>
    </div>
</div>