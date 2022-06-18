<?php


//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
// Functions For Admins.
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

// Checks if the user has filled in all the fields.
function emptyInputCreateAdmin($adfname, $adlname, $ademail, $adphone, $username, $password, $adroles) {
    $result = null;
    if (empty($adfname) || empty($adlname) || empty($ademail) || empty($adphone) || empty($username) || empty($password) || empty($adroles)) {
        $result = true;
    } else {
        $result = false;
    }
    return $result;
}

// Checks if the user has filled in a correct username.
function invalidUid($username) {
    $result = null;
    if (!preg_match("/^[a-zA-Z0-9]*$/", $username)) {
        $result = true;
    } else {
        $result = false;
    }
    return $result;
}

// Checks if the user has filled in a valid email.
function invalidEmail($ademail) {
    $result = null;
    if (!filter_var($ademail, FILTER_VALIDATE_EMAIL)) {
        $result = true;
    } else {
        $result = false;
    }
    return $result;
}

// Checks if the user already exists in the database. Checks for username and email.
function uidExists($conn, $username, $ademail) {
    $sql = "SELECT * FROM admins WHERE adminsUsername = ? OR adminsEmail = ?;";
    $stmt = mysqli_stmt_init($conn);

    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("Location: ../newAdmin.php?error=stmtfailed");
        exit();
    }

    mysqli_stmt_bind_param($stmt, 'ss', $username, $ademail);
    mysqli_stmt_execute($stmt);

    $resultData = mysqli_stmt_get_result($stmt);

    if ($row = mysqli_fetch_assoc($resultData)) {
        return $row;
    } else {
        $result = false;
        return $result;
    }

    mysqli_stmt_close($stmt);
}

// Creates the user in the database.
function createAdmin($conn, $adfname, $adlname, $ademail, $adphone, $username, $password, $adroles) {
    $sql = "INSERT INTO admins (adminsFname, adminsLname, adminsEmail, adminsPhone, adminsUsername, adminsPassword, adminsRole) VALUES (?, ?, ?, ?, ?, ?, ?);";
    $stmt = mysqli_stmt_init($conn);

    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("Location: ../newAdmin.php?error=stmtfailed");
        exit();
    }

    //$hashedPwd = password_hash($password, PASSWORD_DEFAULT);

    mysqli_stmt_bind_param($stmt, 'sssssss', $adfname, $adlname, $ademail, $adphone, $username, $password, $adroles);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    header("Location: ../admin.php?error=none");
    exit();
}


//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
// Functions For Customers
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

// Checks if the user has filled in all the fields.
function emptyInputCreateCustomer($cfname, $clname, $cemail, $cphone, $ccompany, $caddress, $croles) {
    $result = null;
    if (empty($cfname) || empty($clname) || empty($cemail) || empty($cphone) || empty($ccompany) || empty($caddress) || empty($croles)) {
        $result = true;
    } else {
        $result = false;
    }
    return $result;
}

// Checks if the user has filled in a valid email.
function invalidEmailCustomer($cemail) {
    $result = null;
    if (!filter_var($cemail, FILTER_VALIDATE_EMAIL)) {
        $result = true;
    } else {
        $result = false;
    }
    return $result;
}

// Checks if the client already exists in the database. Checks for email.
function CustomerExists($conn, $cemail) {
    $sql = "SELECT * FROM customers WHERE customersEmail = ?;";
    $stmt = mysqli_stmt_init($conn);

    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("Location: ../newCustomer.php?error=stmtfailed");
        exit();
    }

    mysqli_stmt_bind_param($stmt, 's', $cemail);
    mysqli_stmt_execute($stmt);

    $resultData = mysqli_stmt_get_result($stmt);

    if ($row = mysqli_fetch_assoc($resultData)) {
        return $row;
    } else {
        $result = false;
        return $result;
    }

    mysqli_stmt_close($stmt);
}

// Creates the client in the database.
function createCustomer($conn, $cfname, $clname, $cemail, $cphone, $ccompany, $caddress, $croles) {
    $sql = "INSERT INTO customers (customersFname, customersLname, customersEmail, customersPhone, customersCompany, customersAddress, customersLevel) VALUES (?, ?, ?, ?, ?, ?, ?);";
    $stmt = mysqli_stmt_init($conn);

    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("Location: ../newCustomer.php?error=stmtfailed2");
        exit();
    }

    mysqli_stmt_bind_param($stmt, 'sssssss', $cfname, $clname, $cemail, $cphone, $ccompany, $caddress, $croles);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    header("Location: ../customer.php?error=none");
    exit();
}


//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
// Functions For Orders
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

// Checks if the user has filled in all the fields.
function emptyInputCreateOrder($service, $cname, $cemail, $order_status, $receipt) {
    $result = null;
    if (empty($service) || empty($cname) || empty($cemail) || empty($order_status) || empty($receipt)) {
        $result = true;
    } else {
        $result = false;
    }
    return $result;
}

// Checks if the user has filled in a valid email.
function invalidEmailCustomerOrder($cemail) {
    $result = null;
    if (!filter_var($cemail, FILTER_VALIDATE_EMAIL)) {
        $result = true;
    } else {
        $result = false;
    }
    return $result;
}

// Creates the Order in the database.
function createOrder($conn, $service, $cname, $cemail, $order_status, $receipt) {
    $sql = "INSERT INTO orders (ordersService, ordersNameCustomer, ordersEmailCustomer, ordersStatus, ordersReceipt) VALUES (?, ?, ?, ?, ?);";
    $stmt = mysqli_stmt_init($conn);

    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("Location: ../newOrder.php?error=stmtfailed2");
        exit();
    }

    mysqli_stmt_bind_param($stmt, 'sssss', $service, $cname, $cemail, $order_status, $receipt);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    header("Location: ../order.php?error=none");
    exit();
}