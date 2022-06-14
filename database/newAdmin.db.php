<?php 

if (isset($_POST["submit"])) {
    $adfname = $_POST["first-name"];
    $adlname = $_POST["last-name"];
    $ademail = $_POST["email"];
    $adphone = $_POST["phone"];
    $username = $_POST["username"];
    $password = $_POST["password"];
    $adroles = $_POST["admin_roles"];

    require_once "dbh.db.php";
    require_once "functions.db.php";

    // Error Handlers

    // Ελέγχει εάν ο χρήστη έχει συμπληρώσει όλα τα πεδία. 
    if (emptyInputCreateAdmin($adfname, $adlname, $ademail, $adphone, $username, $password, $adroles) !== false) {
        header ("Location: ../newAdmin.php?error=emptyinput");
        exit();
    }

    // Ελέγχει εάν ο χρήστης έχει συμπληρώσει ένα σωστο username.
    if (invalidUid($username) !== false) {
        header ("Location: ../newAdmin.php?error=invalidusername");
        exit(); 
    }

    // Ελέγχει εάν ο χρήστη έχει συμπληρώσει ένα σωστό email
    if (invalidEmail($ademail) !== false) {
        header ("Location: ../newAdmin.php?error=invalidemail");
        exit();
    }

    // Ελέγχει εάν υπάρχει ήδη ο χρήστης στην βάση δεδομένων. Ελέγχει για username και email.
    if (uidExists($conn, $username, $ademail) !== false) {
        header ("Location: ../newAdmin.php?error=userexists");
        exit();
    }

    // Δημιουργεί τον χρήστη στην βάση δεδομένων
    createAdmin($conn, $adfname, $adlname, $ademail, $adphone, $username, $password, $adroles);

} else {
    header ("Location: ../newAdmin.php");
    exit();
}