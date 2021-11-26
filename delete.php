<?php
include 'connect.php';
$item_id = $_GET['item_id'];

$query = mysqli_query($connect,"DELETE FROM inventory WHERE item_id='$item_id'");

if($query) {
    header("location:inventorylist.php");
}
else {
    echo "Deletion Failed!";
}
?>