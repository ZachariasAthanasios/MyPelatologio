<?php

include 'dbh.db.php';
$id = $_GET['updateid'];
$sql = "SELECT * FROM customers WHERE customersID = $id";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);

    $valuefname = $row['customersFname'];
    $valuelname = $row['customersLname'];
    $valueemail = $row['customersEmail'];
    $valuephone = $row['customersPhone'];
    $valuecompany = $row['customersCompany'];
    $valueaddress = $row['customersAddress'];
    $valuelevel = $row['customersLevel'];

    if (isset($_POST['submit'])) {
        $fname = $_POST['cfirst-name'];
        $lname = $_POST['clast-name'];
        $email = $_POST['cemail'];
        $phone = $_POST['cphone'];
        $company = $_POST['ccompany'];
        $address = $_POST['caddress'];
        $level = $_POST['customer_roles'];

        if (isset($_GET['updateid'])) {
            $updateID = $_GET['updateid'];

            $sql = "UPDATE customers 
                    SET customersFname = '$fname', 
                        customersLname = '$lname', 
                        customersEmail = '$email', 
                        customersPhone = '$phone', 
                        customersCompany = '$company', 
                        customersAddress = '$address',
                        customersLevel = '$level'
                    WHERE customersID = $updateID;";
            
            $result = mysqli_query($conn, $sql);
            if ($result) {
                header("Location: ../customer.php?update=done");
            } else {
                die(mysqli_error($conn));
            }
        }
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Meta tags -->
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Αn app for Freelancers to track their sales.">
    <meta name="keywords" content="CMS, MyCMS, MyPelatologio, HTML, CSS, JavaScript, PHP, MySQL">
    <meta name="author" content="Zacharias Athanasios">

    <!-- Page Title -->
    <title>Update Customer</title>

    <!-- Font-Awesome CDN Link 6.1.1 -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- Custom CSS File Link -->
    <link rel="stylesheet" href="../styles/style.css">
</head>
<body>

    <div class="container-dashboard">
        
        <!-- Navbar Menu -->
        <?php include ('../includes/sidebar.php'); ?>
        
        <!-- Main -->
        <div class="main" id="main">

            <!-- Top Bar -->
            <div class="topbar">
                <div class="toggle">
                    <i class="fa-solid fa-bars"></i>
                </div>

                <!-- Search Field -->
                <div class="search">
                    <label>
                        <input type="text" placeholder="Search">
                        <i class="fa-solid fa-magnifying-glass"></i>
                    </label>
                </div>
                    
                <!-- Users Profile Image -->
                <div class="user">
                    <img src="../images/userProfileImage.jpg" alt="User Profile Image">
                </div>
            </div>

            <!-- Create new Admin Form -->
            <div class="details-customer">
                <div class="customers" id="customers">

                    <!-- Form Title -->
                    <div class="cardHeader">
                        <h2>Update Customer</h2>
                    </div>

                    <form method="POST">

                        <!-- First Name -->
                        <div class="input_field first-name">
                            <label for="first-name-field">First Name</label>
                            <input type="text" name="cfirst-name" class="input" id="first-name-field" value="<?php echo $valuefname ?>">
                        </div>

                        <!-- Last Name -->
                        <div class="input_field">
                            <label for="last-name-field">Last Name</label>
                            <input type="text" name="clast-name" class="input" id="last-name-field" value="<?php echo $valuelname ?>">
                        </div>

                        <!-- Email Name -->
                        <div class="input_field">
                            <label for="email-field">Email</label>
                            <input type="email" name="cemail" class="input" id="email-field" value="<?php echo $valueemail ?>">
                        </div>

                        <!-- Phone -->
                        <div class="input_field">
                            <label for="phone-field">Phone</label>
                            <input type="text" name="cphone" class="input" id="phone-field" value="<?php echo $valuephone ?>">
                        </div>

                        <!-- Company -->
                        <div class="input_field">
                            <label for="company-field">Company</label>
                            <input type="text" name="ccompany" class="input" id="company-field" value="<?php echo $valuecompany ?>">
                        </div>

                        <!-- Address -->
                        <div class="input_field">
                            <label for="address-field">Address</label>
                            <input type="text" name="caddress" class="input" id="address-field" value="<?php echo $valueaddress ?>">
                        </div>

                        <!-- Customer Level -->
                        <div class="input_field">
                            <label for="customer-roles">Level</label>
                            <select name="customer_roles" id="customer-roles">
                                <option value="NewCustomer">New Customer</option>
                                <option value="GoodCustomer">Good Customer</option>
                                <option value="PerfectCustomer">Perfect Customer</option>
                            </select>
                        </div>

                        <!-- Submit Button -->
                        <div class="input-field">
                            <input type="submit" value="Update Customer" name="submit" class="newCustomer-btn">
                        </div>
                    </form>
                </div>

            </div>

            <!-- Copyright -->
            <span class="copyright">Zacharias Athanasios © 2022. All Rights Reserved.</span>
        </div>
    </div>
    
    <script>
        // Sidebar - Menu Toggle
        let toggle = document.querySelector(".toggle");
        let navigation = document.querySelector(".navigation");
        let main = document.querySelector(".main");

        toggle.onclick = function() {
	        navigation.classList.toggle("active");
            main.classList.toggle("active");
        }
    </script>

    <!-- Custom JS File Link -->
    <script type="text/javascript" src="js/main.js"></script>
</body>
</html>