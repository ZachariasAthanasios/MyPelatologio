<?php

if (isset($_POST["submit"])) {
    $cfname = $_POST["cfirst-name"];
    $clname = $_POST["clast-name"];
    $cemail = $_POST["cemail"];
    $cphone = $_POST["cphone"];
    $ccompany = $_POST["ccompany"];
    $caddress = $_POST["caddress"];
    $croles = $_POST["customer_roles"];

    require_once "dbh.db.php";
    require_once "functions.db.php";

    // Error Handlers.

    // Checks if the user has filled in all the fields. 
    if (emptyInputCreateCustomer($cfname, $clname, $cemail, $cphone, $ccompany, $caddress, $croles) !== false) {
        header ("Location: ../newCustomer.php?error=emptyinput");
        exit();
    }

    // Checks if the user has filled in a valid email.
    if (invalidEmailCustomer($cemail) !== false) {
        header ("Location: ../newCustomer.php?error=invalidemail");
        exit();
    }

    // Checks if the client already exists in the database. Checks for email.
    if (customerExists($conn, $cemail) !== false) {
        header ("Location: ../newCustomer.php?error=customerexists");
        exit();
    }

    // Creates the client in the database.
    createCustomer($conn, $cfname, $clname, $cemail, $cphone, $ccompany, $caddress, $croles);

} else {
    header ("Location: ../newCustomer.php");
    exit();
}