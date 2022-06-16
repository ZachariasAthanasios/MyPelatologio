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

    // Ελέγχει εάν ο χρήστη έχει συμπληρώσει όλα τα πεδία. 
    if (emptyInputCreateOrder($service, $cname, $cemail, $order_status, $receipt) !== false) {
        header ("Location: ../newOrder.php?error=emptyinput");
        exit();
    }

    // Ελέγχει εάν ο χρήστη έχει συμπληρώσει ένα σωστό email
    if (invalidEmailCustomerOrder($cemail) !== false) {
        header ("Location: ../newOrder.php?error=invalidemail");
        exit();
    }

    // Δημιουργεί την Order στην βάση δεδομένων
    createOrder($conn, $service, $cname, $cemail, $order_status, $receipt);

} else {
    header ("Location: ../newOrder.php");
    exit();
}