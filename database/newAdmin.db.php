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

    // Checks if the user has filled in all the fields.
    if (emptyInputCreateAdmin($adfname, $adlname, $ademail, $adphone, $username, $password, $adroles) !== false) {
        header ("Location: ../newAdmin.php?error=emptyinput");
        exit();
    }

    // Checks if the user has filled in a correct username.
    if (invalidUid($username) !== false) {
        header ("Location: ../newAdmin.php?error=invalidusername");
        exit(); 
    }

    // Checks if the user has filled in a valid email.
    if (invalidEmail($ademail) !== false) {
        header ("Location: ../newAdmin.php?error=invalidemail");
        exit();
    }

    // Checks if the user already exists in the database. Checks for username and email.
    if (uidExists($conn, $username, $ademail) !== false) {
        header ("Location: ../newAdmin.php?error=userexists");
        exit();
    }

    // Creates the user in the database.
    createAdmin($conn, $adfname, $adlname, $ademail, $adphone, $username, $password, $adroles);

} else {
    header ("Location: ../newAdmin.php");
    exit();
}