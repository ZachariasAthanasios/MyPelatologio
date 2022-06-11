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
    <title>Customer | MyPelatologio</title>

    <!-- Font-Awesome CDN Link 6.1.1 -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- Custom CSS File Link -->
    <link rel="stylesheet" href="styles/style.css">
</head>
<body>

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
                <div class="search">
                    <label>
                        <input type="text" placeholder="Search">
                        <i class="fa-solid fa-magnifying-glass"></i>
                    </label>
                </div>
                    
                <!-- Users Profile Image -->
                <div class="user">
                    <img src="./images/userProfileImage.jpg" alt="User Profile Image">
                </div>
            </div>

            <!-- Customer Detail List -->
            <div class="details-customer">

                <!-- Customers Detail List -->
                <div class="customers" id="customers">
                    <div class="cardHeader">
                        <h2>Customers</h2>
                        <a href="./createCustomer.php" class="btn-view_all">Create Customer</a>
                    </div>
                    <table>
                        <thead>
                            <tr>
                                <td>Name</td>
                                <td>Email</td>
                                <td>Phone</td>
                                <td>Company</td>
                                <td>Address</td>
                                <td>Level</td>
                                <td>Orders</td>
                                <td>Create At</td>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Zacharias Thanos ldkglkdghkladhgkldhglkhlk</td>
                                <td>zachariasathanasioss@gmail.com</td>
                                <td>6981234567</td>
                                <td>Airbyte EΠΕ</td>
                                <td>Εγνατία 18</td>
                                <td class="customer-level">Ok Customer</td>
                                <td>5</td>
                                <td>06/06/2022</span> </td>
                            </tr>

                            <tr>
                                <td>Zacharias Thanos ldkglkdghkladhgkldhglkhlk</td>
                                <td>zachariasathanasioss@gmail.com</td>
                                <td>6981234567</td>
                                <td>Airbyte EΠΕ</td>
                                <td>Εγνατία 18</td>
                                <td class="customer-level">Ok Customer</td>
                                <td>5</td>
                                <td>06/06/2022</span> </td>
                            </tr>

                            <tr>
                                <td>Zacharias Thanos ldkglkdghkladhgkldhglkhlk</td>
                                <td>zachariasathanasioss@gmail.com</td>
                                <td>6981234567</td>
                                <td>Airbyte EΠΕ</td>
                                <td>Εγνατία 18</td>
                                <td class="customer-level">Ok Customer</td>
                                <td>5</td>
                                <td>06/06/2022</span> </td>
                            </tr>

                            <tr>
                                <td>Zacharias Thanos ldkglkdghkladhgkldhglkhlk</td>
                                <td>zachariasathanasioss@gmail.com</td>
                                <td>6981234567</td>
                                <td>Airbyte EΠΕ</td>
                                <td>Εγνατία 18</td>
                                <td class="customer-level">Ok Customer</td>
                                <td>5</td>
                                <td>06/06/2022</span> </td>
                            </tr>
                        </tbody>
                    </table>
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