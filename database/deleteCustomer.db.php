<?php 

if (isset($_GET['deleteid'])) {
    $id= $_GET['deleteid'];

    require_once "dbh.db.php";

    $sql = "DELETE FROM customers WHERE customersID = '$id'";
    $result = mysqli_query($conn, $sql);

    if ($result) {
        // echo "Deleted successfully";
        header("Location: ../customer.php?delete=done");
    } else {
        die(mysqli_error($conn));
    }
}