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
    <title>Dashboard | MyPelatologio</title>

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

            <!-- Information Cards -->
            <div class="cardBox">

                <!-- Card #1 -->
                <div class="card">
                    <div>
                        <div class="numbers">1.504</div>
                        <div class="cardName">Admins</div>
                    </div>
                    <div class="iconBox">
                        <i class="fa-solid fa-eye"></i>
                    </div>
                </div>

                <!-- Card #2 -->
                <div class="card">
                    <div>
                        <div class="numbers">1.504</div>
                        <div class="cardName">Customers</div>
                    </div>
                    <div class="iconBox">
                        <i class="fa-solid fa-eye"></i>
                    </div>
                </div>

                <!-- Card #3 -->
                <div class="card">
                    <div>
                        <div class="numbers">1.504</div>
                        <div class="cardName">Orders</div>
                    </div>
                    <div class="iconBox">
                        <i class="fa-solid fa-eye"></i>
                    </div>
                </div>

                <!-- Card #4 -->
                <div class="card">
                    <div>
                        <div class="numbers">1.504 €</div>
                        <div class="cardName">Profit</div>
                    </div>
                    <div class="iconBox">
                        <i class="fa-solid fa-eye"></i>
                    </div>
                </div>
            </div>

            
            <div class="details">

                <!-- Recent Customers Detail List -->
                <div class="recentCustomers" id="recentCustomers">
                    <div class="cardHeader">
                        <h2>Recent Customers</h2>
                        <a href="./customer.php" class="btn-view_all">View All</a>
                    </div>
                    <table>
                        <thead>
                            <tr>
                                <td>Name</td>
                                <td>Company</td>
                                <td>Orders</td>
                                <td>Status</td>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Zacharias Thanos ldkglkdghkladhgkldhglkhlk</td>
                                <td>Airbyte.gr</td>
                                <td>1</td>
                                <td> <span class="status ok">Ok Customer</span> </td>
                            </tr>

                            <tr>
                                <td>Zacharias Thanos</td>
                                <td>Airbyte.gr</td>
                                <td>1</td>
                                <td> <span class="status good">Good Customer</span> </td>
                            </tr>

                            <tr>
                                <td>Zacharias Thanos</td>
                                <td>Airbyte.gr</td>
                                <td>1</td>
                                <td> <span class="status good">Good Customer</span> </td>
                            </tr>

                            <tr>
                                <td>Zacharias Thanos</td>
                                <td>Airbyte.gr</td>
                                <td>1</td>
                                <td> <span class="status good">Good Customer</span> </td>
                            </tr>

                            <tr>
                                <td>Zacharias Thanos</td>
                                <td>Airbyte.gr</td>
                                <td>1</td>
                                <td> <span class="status good">Good Customer</span> </td>
                            </tr>

                            <tr>
                                <td>Zacharias Thanos</td>
                                <td>Airbyte.gr</td>
                                <td>1</td>
                                <td> <span class="status good">Good Customer</span> </td>
                            </tr>

                            <tr>
                                <td>Zacharias Thanos</td>
                                <td>Airbyte.gr</td>
                                <td>1</td>
                                <td> <span class="status new">New Customer</span> </td>
                            </tr>

                            <tr>
                                <td>Zacharias Thanos</td>
                                <td>Airbyte.gr</td>
                                <td>1</td>
                                <td> <span class="status new">New Customer</span> </td>
                            </tr>

                            <tr>
                                <td>Zacharias Thanos</td>
                                <td>Airbyte.gr</td>
                                <td>1</td>
                                <td> <span class="status new">New Customer</span> </td>
                            </tr>

                            <tr>
                                <td>Zacharias Thanos</td>
                                <td>Airbyte.gr</td>
                                <td>1</td>
                                <td> <span class="status new">New Customer</span> </td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <!-- Recent Orders -->
                <div class="recentOrders" id="recentOrders">
                    <div class="cardHeader">
                        <h2>Recent Orders</h2>
                    </div>
                    <table>
                        <tr>
                            <td>
                                <i class="fa-solid fa-laptop-code"></i>
                                <h4>Digital Marketing</h4>
                                <span>Zacharias Thanos</span>
                            </td>
                            <td> <span class="status delivered">Delivered</span> </td>
                        </tr>

                        <tr>
                            <td>
                                <i class="fa-solid fa-laptop-code"></i>
                                <h4>Digital Marketing</h4>
                                <span>Zacharias Thanos</span>
                            </td>
                            <td> <span class="status pending">Pending</span> </td>
                        </tr>

                        <tr>
                            <td>
                                <i class="fa-solid fa-laptop-code"></i>
                                <h4>Digital Marketing</h4>
                                <span>Zacharias Thanos</span>
                            </td>
                            <td> <span class="status canceling">Canceling</span> </td>
                        </tr>

                        <tr>
                            <td>
                                <i class="fa-solid fa-laptop-code"></i>
                                <h4>Digital Marketing</h4>
                                <span>Zacharias Thanos</span>
                            </td>
                            <td> <span class="status inprogress">In Progress</span> </td>
                        </tr>

                        <tr>
                            <td>
                                <i class="fa-solid fa-laptop-code"></i>
                                <h4>Digital Marketing</h4>
                                <span>Zacharias Thanos</span>
                            </td>
                            <td> <span class="status inprogress">In Progress</span> </td>
                        </tr>
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