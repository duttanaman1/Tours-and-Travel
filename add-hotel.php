<?php
include("header.php");
include("connect.php");

if ($_POST['submit'] != null) {
    $id = $_POST['tripid'];

?>
    <div class="container">
        <div class="card">
            <div class="card-header">
                <h2>ADD hotel</h2>
            </div>
            <div class="card-body row">
                <div class="col-md-5">
                    <form action="sqladd-hotel.php" method="post">
                        hotel name:
                        <input type="text" name="name" id="" class="form-control">
                        hotel price:
                        <input type="number" name="price" id="" class="form-control">
                        <input type="hidden" name="tripid" value="<?php echo $id; ?>"><br>
                        <input type="submit" value="ADD" class="btn btn-warning" name="submit">
                    </form>
                </div>

            </div>
        </div>
    <?php } ?>