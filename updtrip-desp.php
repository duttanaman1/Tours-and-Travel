<?php
include('connect.php');
include('header.php');
if ($_POST['submit'] != null) {
    $id = $_POST['tripid'];

?>
    <div class="container my-3">
        <form action="sqlupdtrip-desp.php" method="post">
            <input type="hidden" name="tripid" value="<?php echo $id; ?>">
            Update Description:
            <textarea name="desp" id="" cols="50" rows="10" class="form-control"></textarea>
            <br>

            <input type="submit" value="update" name="submit" class="btn btn-warning">
        </form>
    </div>
<?php } ?>