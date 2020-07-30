<?php
include("header.php");
include("connect.php");
if ($_POST['submit'] != null) {
    $id = $_POST['hotelid'];
?>
    <div class="container">
        <form action="sqlupd-hotel.php" method="post" class="w-25">
            <input type="hidden" name="hotelid" value="<?php echo $id; ?>">
            Price:
            <input type="number" name="price" id="" class="form-control"><br>
            <input type="submit" value="UPDATE" name="submit" class="btn btn-warning">
        </form>
    </div>
<?php  } ?>