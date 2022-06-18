<?php 

if (isset($_GET['deleteid'])) {
    $id= $_GET['deleteid'];

    require_once "dbh.db.php";

    $sql = "DELETE FROM orders WHERE ordersID = '$id'";
    $result = mysqli_query($conn, $sql);

    if ($result) {
        header("Location: ../order.php?delete=done");
    } else {
        die(mysqli_error($conn));
    }
}