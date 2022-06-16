<?php

function emptyInputCreateAdmin($adfname, $adlname, $ademail, $adphone, $username, $password, $adroles) {
    $result = null;
    if (empty($adfname) || empty($adlname) || empty($ademail) || empty($adphone) || empty($username) || empty($password) || empty($adroles)) {
        $result = true;
    } else {
        $result = false;
    }
    return $result;
}

function invalidUid($username) {
    $result = null;
    if (!preg_match("/^[a-zA-Z0-9]*$/", $uid)) {
        $result = true;
    } else {
        $result = false;
    }
    return $result;
}

function invalidEmail($ademail) {
    $result = null;
    if (!filter_var($ademail, FILTER_VALIDATE_EMAIL)) {
        $result = true;
    } else {
        $result = false;
    }
    return $result;
}

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

function createAdmin($conn, $adfname, $adlname, $ademail, $adphone, $username, $password, $adroles) {
    $sql = "INSERT INTO admins (adminsFname, adminsLname, adminsEmail, adminsPhone, adminsUsername, adminsPassword, adminsRole) VALUES (?, ?, ?, ?, ?, ?, ?);";
    $stmt = mysqli_stmt_init($conn);

    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("Location: ../newAdmin.php?error=stmtfailed");
        exit();
    }

    // $hashedPwd = password_hash($pwd, PASSWORD_DEFAULT);

    mysqli_stmt_bind_param($stmt, 'sssssss', $adfname, $adlname, $ademail, $adphone, $username, $password, $adroles);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    header("Location: ../admin.php?error=none");
    exit();
}



// Functions For Customers



function emptyInputCreateCustomer($cfname, $clname, $cemail, $cphone, $ccompany, $caddress, $croles) {
    $result = null;
    if (empty($cfname) || empty($clname) || empty($cemail) || empty($cphone) || empty($ccompany) || empty($caddress) || empty($croles)) {
        $result = true;
    } else {
        $result = false;
    }
    return $result;
}

function invalidEmailCustomer($cemail) {
    $result = null;
    if (!filter_var($cemail, FILTER_VALIDATE_EMAIL)) {
        $result = true;
    } else {
        $result = false;
    }
    return $result;
}

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


// Functions For Orders


function emptyInputCreateOrder($service, $cname, $cemail, $order_status, $receipt) {
    $result = null;
    if (empty($service) || empty($cname) || empty($cemail) || empty($order_status) || empty($receipt)) {
        $result = true;
    } else {
        $result = false;
    }
    return $result;
}

function invalidEmailCustomerOrder($cemail) {
    $result = null;
    if (!filter_var($cemail, FILTER_VALIDATE_EMAIL)) {
        $result = true;
    } else {
        $result = false;
    }
    return $result;
}

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