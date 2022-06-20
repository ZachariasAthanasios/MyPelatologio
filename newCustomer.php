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
    <title>Create Customer</title>

    <!-- Favicon Icon -->
    <link rel="icon" href="images/coding.jpeg" type="image/x-icon">

    <!-- Font-Awesome CDN Link 6.1.1 -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- Custom CSS File Link -->
    <link rel="stylesheet" href="styles/style.css">
</head>
<body>

    <!-- Only anyone who has logged in can access the page. -->
    <?php
        include_once "database/dbh.db.php";
        if (!isset($_SESSION['adminsUsername'])) {
            header("Location: http://localhost/MyPelatologio/index.php?error=YouNeedToLoginFirst");
        }
    ?>

    <div class="container-dashboard">
        
        <!-- Navbar Menu -->
        <?php include ('includes/sidebar.php'); ?>
        
        <!-- Main -->
        <div class="main" id="main">

            <!-- Top Bar -->
            <div class="topbar">
                <div class="toggle">
                    <i class="fa-solid fa-bars"></i>
                </div>

                <!-- Search Field -->
                <?php include ('includes/search.inc.php'); ?>

            </div>

            <!-- Create new Admin Form -->
            <div class="details-customer">
                <div class="customers" id="customers">

                    <!-- Form Title -->
                    <div class="cardHeader">
                        <h2>New Customer</h2>
                    </div>

                    <form action="./database/newCustomer.db.php" method="POST">

                        <!-- First Name -->
                        <div class="input_field first-name">
                            <label for="first-name-field">First Name</label>
                            <input type="text" name="cfirst-name" class="input" id="first-name-field">
                        </div>

                        <!-- Last Name -->
                        <div class="input_field">
                            <label for="last-name-field">Last Name</label>
                            <input type="text" name="clast-name" class="input" id="last-name-field">
                        </div>

                        <!-- Email Name -->
                        <div class="input_field">
                            <label for="email-field">Email</label>
                            <input type="email" name="cemail" class="input" id="email-field">
                        </div>

                        <!-- Phone -->
                        <div class="input_field">
                            <label for="phone-field">Phone</label>
                            <input type="number" name="cphone" class="input" id="phone-field">
                        </div>

                        <!-- Company -->
                        <div class="input_field">
                            <label for="company-field">Company</label>
                            <input type="text" name="ccompany" class="input" id="company-field">
                        </div>

                        <!-- Address -->
                        <div class="input_field">
                            <label for="address-field">Address</label>
                            <input type="text" name="caddress" class="input" id="address-field">
                        </div>

                        <!-- Customer Level -->
                        <div class="input_field">
                            <label for="admin-roles">Level</label>
                            <select name="customer_roles" id="admin-roles">
                                <option value="NewCustomer">New Customer</option>
                                <option value="GoodCustomer">Good Customer</option>
                                <option value="PerfectCustomer">Perfect Customer</option>
                            </select>
                        </div>

                        <!-- Submit Button -->
                        <div class="input-field">
                            <input type="submit" value="Create Customer" name="submit" class="newCustomer-btn">
                        </div>

                        <!-- Error Messages -->
			<?php include ('includes/createCustomerErrorMessages.inc.php'); ?>
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
