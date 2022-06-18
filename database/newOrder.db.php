<?php

if (isset($_POST["submit"])) {
    $service = $_POST["service"];
    $cname = $_POST["customer-name"];
    $cemail = $_POST["cemail"];
    $order_status = $_POST["order_status"];
    $receipt = $_POST["receipt"];

    require_once "dbh.db.php";
    require_once "functions.db.php";


    // Error Handlers

    // Checks if the user has filled in all the fields.
    if (emptyInputCreateOrder($service, $cname, $cemail, $order_status, $receipt) !== false) {
        header ("Location: ../newOrder.php?error=emptyinput");
        exit();
    }

    // Checks if the user has filled in a valid email.
    if (invalidEmailCustomerOrder($cemail) !== false) {
        header ("Location: ../newOrder.php?error=invalidemail");
        exit();
    }

    // Creates the Order in the database.
    createOrder($conn, $service, $cname, $cemail, $order_status, $receipt);

} else {
    header ("Location: ../newOrder.php");
    exit();
}