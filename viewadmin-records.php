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
<div class="container-fluid my-3">
    <table class="table table-hover table-bordered">

        <thead class="bg-primary">
            <tr>
                <th scope="col">BOOK ID</th>
                <th scope="col">Trip ID</th>
                <th scope="col">Customer Name</th>
                <th scope="col">Date</th>
                <th scope="col">Number of days</th>
                <th scope="col">Hotel Name</th>
                <th scope="col">Transport Name</th>
                <th scope="col">Price</th>
                <th scope="col">Status</th>
                <th scope="col">Paid via COD</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $sqlbook = mysqli_query($con, "SELECT * FROM book");
            if (mysqli_num_rows($sqlbook) > 0) {
                while ($book = mysqli_fetch_assoc($sqlbook)) {
                    $bookid = $book['bookid'];
            ?>
                    <tr>
                        <td><?php echo $book['bookid']; ?></td>
                        <td><?php echo $book['tripid']; ?></td>
                        <td><?php echo $book['name']; ?></td>
                        <td><?php echo $book['date']; ?></td>
                        <td><?php echo $book['days']; ?></td>
                        <td><?php echo $book['hotel']; ?></td>
                        <td><?php echo $book['transport']; ?></td>
                        <td><?php echo $book['price']; ?></td>
                        <?php
                        if ($book['status'] == 'booked') {
                        ?>
                            <td class="table-warning"><?php echo $book['status']; ?></td>
                            <td>
                                <form action="sqlchange-status.php" method="post">
                                    <input type="hidden" name="bookid" value="<?php echo $book['bookid']; ?>">
                                    <input type="submit" value="Paid" name="submit" class="btn btn-success">
                                </form>
                            </td>
                        <?php
                        } else {
                        ?>
                            <td class="table-success"><?php echo $book['status']; ?></td>
                            <td> <button class="btn btn-info">Booking confirmed </button></td>
                        <?php
                        }
                        ?>


                    </tr>
            <?php
                }
            }
            ?>

        </tbody>
    </table>
</div>