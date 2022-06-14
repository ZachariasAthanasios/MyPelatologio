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

    // Error Handlers

    // Ελέγχει εάν ο χρήστη έχει συμπληρώσει όλα τα πεδία. 
    if (emptyInputCreateCustomer($cfname, $clname, $cemail, $cphone, $ccompany, $caddress, $croles) !== false) {
        header ("Location: ../newCustomer.php?error=emptyinput");
        exit();
    }

    // Ελέγχει εάν ο χρήστη έχει συμπληρώσει ένα σωστό email
    if (invalidEmailCustomer($cemail) !== false) {
        header ("Location: ../newCustomer.php?error=invalidemail");
        exit();
    }

    // Ελέγχει εάν υπάρχει ήδη ο πελάτης στην βάση δεδομένων. Ελέγχει για email.
    if (customerExists($conn, $cemail) !== false) {
        header ("Location: ../newCustomer.php?error=customerexists");
        exit();
    }

    // Δημιουργεί τον πελάτη στην βάση δεδομένων
    createCustomer($conn, $cfname, $clname, $cemail, $cphone, $ccompany, $caddress, $croles);

} else {
    header ("Location: ../newCustomer.php");
    exit();
}