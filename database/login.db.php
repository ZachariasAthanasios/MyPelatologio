<?php 

// session_start();

if (isset($_POST['submit'])) {
    function validate($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    include "dbh.db.php";

    $username = validate($_POST['username']);
    $password = validate($_POST['password']);

    if (empty($username) || empty($password)) {
        header("Location: ../index.php?error=emptyInputs")
        exit();
    } else {
        $sql = "SELECT * FROM admins WHERE adminsUsername = '$username' AND adminsPassword = '$password';";
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) === 1) {
            $row = mysqli_fetch_assoc($result);
            if ($row['adminsUsername'] === $username && $row['adminsPassword'] === $password) {
                // $_SESSION['adminsID'] = $row['adminsID'];
                $_SESSION['adminsUsername'] = $row['adminsUsername'];
                // $_SESSION['adminsFname'] = $row['adminsFname'];
                // $_SESSION['adminsLname'] = $row['adminsLname'];
                header("Location: ../dashboard.php")
                exit();
            } else {
                header("Location: ../index.php?error=InvaliadUsernameAndPassword");
                exit();
            }
        } else {
            header("Location: ../index.php?error=InvaliadUsernameAndPassword");
            exit();
        }
    }
} else {
    header("Location: ../index.php");
    exit();
}