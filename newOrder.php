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
    <title>Create New Order</title>

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
            <div class="details-order">
                <div class="orders" id="orders">

                    <!-- Form Title -->
                    <div class="cardHeader">
                        <h2>New Order</h2>
                    </div>

                    <form action="./database/newOrder.db.php" method="POST">

                        <!-- Service -->
                        <div class="input_field service">
                            <label for="service">Service</label>
                            <select name="service" id="service">
                                <option value="Eshop">Eshop</option>
                                <option value="Business Website">Business Website</option>
                                <option value="SEO">SEO</option>
                                <option value="Digital Marketing">Digital Marketing</option>
                            </select>
                        </div>

                        <!-- Customer Name -->
                        <div class="input_field">
                            <label for="customer-name-field">Customer Name</label>
                            <input type="text" name="customer-name" class="input" id="customer-name-field">
                        </div>

                        <!-- Customer Email -->
                        <div class="input_field">
                            <label for="email-field">Customer Email</label>
                            <input type="email" name="cemail" class="input" id="email-field">
                        </div>

                        <!-- Status -->
                        <div class="input_field">
                            <label for="order_status">Status</label>
                            <select name="order_status" id="order_status">
                                <option value="Pending">Pending</option>
                                <option value="Delivered">Delivered</option>
                                <option value="Canceling">Canceling</option>
                                <option value="InProgress">In Progress</option>
                            </select>
                        </div>

                        <!-- Receipt -->
                        <div class="input_field">
                            <label for="receipt-field">Receipt (€)</label>
                            <input type="number" name="receipt" class="input" id="receipt-field">
                        </div>

                        <!-- Submit Button -->
                        <div class="input-field">
                            <input type="submit" value="New Order" name="submit" class="newOrder-btn">
                        </div>

                        <!-- Error Messages -->
			<?php include ('includes/newOrderErrorMessages.inc.php'); ?>
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
