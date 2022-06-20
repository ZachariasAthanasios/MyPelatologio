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

    <!-- Σύνδεση Favicon Icon -->
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

            <!-- Information Cards -->
            <div class="cardBox">

                <!-- Card #1 -->
                <div class="card">
                    <div>
                        <div class="numbers">
                            <?php 
                                $sql = "SELECT * FROM admins";
                                if ($result = mysqli_query($conn, $sql)) {
                                    $rowCount = mysqli_num_rows($result);
                                    echo $rowCount;
                                }
                            ?>
                        </div>
                        <div class="cardName">Admins</div>
                    </div>
                    <div class="iconBox">
                        <i class="fa-solid fa-hammer"></i>
                    </div>
                </div>

                <!-- Card #2 -->
                <div class="card">
                    <div>
                        <div class="numbers">
                            <?php 
                                $sql = "SELECT * FROM customers";
                                if ($result = mysqli_query($conn, $sql)) {
                                    $rowCount = mysqli_num_rows($result);
                                    echo $rowCount;
                                }
                            ?>
                        </div>
                        <div class="cardName">Customers</div>
                    </div>
                    <div class="iconBox">
                        <i class="fa-solid fa-user"></i>
                    </div>
                </div>

                <!-- Card #3 -->
                <div class="card">
                    <div>
                        <div class="numbers">
                            <?php 
                                $sql = "SELECT * FROM orders";
                                if ($result = mysqli_query($conn, $sql)) {
                                    $rowCount = mysqli_num_rows($result);
                                    echo $rowCount;
                                }
                            ?>
                        </div>
                        <div class="cardName">Orders</div>
                    </div>
                    <div class="iconBox">
                        <i class="fa-solid fa-receipt"></i>
                    </div>
                </div>

                <!-- Card #4 -->
                <div class="card">
                    <div>
                        <div class="numbers">
                            <?php 
                                $sql = "SELECT sum(ordersReceipt) FROM orders";
                                $q = mysqli_query($conn, $sql);
                                $row = mysqli_fetch_array($q);
                                
                                if ($row[0] != 0) {
                                    echo $row[0];
                                } else {
                                    echo "0";
                                }
                            ?>
                        </div>
                        <div class="cardName">Profit</div>
                    </div>
                    <div class="iconBox">
                        <i class="fa-solid fa-euro-sign"></i>
                    </div>
                </div>
            </div>

            
            <div class="details">

                <!-- SQL Querry for Recent Customer view. -->
                <?php 
                    $sql = "SELECT * FROM customers limit 10;";
                    $result = mysqli_query($conn, $sql);
                    $resultData = mysqli_num_rows($result);
                ?>

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
                                <td>Phone</td>
                                <td>Status</td>
                            </tr>
                        </thead>
                        <tbody>

                            <!-- If there is data print the information per row -->
                            <?php
                                if ($resultData > 0) {
                                    while ($row = mysqli_fetch_array($result)) {
                            ?>

                            <tr>
                                <td>
                                    <?php
                                        echo $row['customersFname'] . " " . $row['customersLname'];
                                    ?>
                                </td>
                                <td>
                                    <?php 
                                        echo $row['customersCompany'];
                                    ?>
                                </td>
                                <td>
                                    <?php 
                                        echo $row['customersPhone'];
                                    ?>
                                </td>
                                <td>
                                    <?php 
                                        if ($row['customersLevel'] == "NewCustomer") {
                                            echo "<span class='status new'>New Customer</span>";
                                        }
                                        else if ($row['customersLevel'] == "GoodCustomer") {
                                            echo "<span class='status good'>Good Customer</span>";
                                        }
                                        else if ($row['customersLevel'] == "PerfectCustomer") {
                                            echo "<span class='status ok'>Perfect Customer</span>";
                                        }
                                    ?>
                                </td>
                            </tr>

                            <?php
                                    } // While Close
                                } //If Close
                            ?>
                                
                        </tbody>
                    </table>
                </div>

                <!-- Recent Orders -->
                <div class="recentOrders" id="recentOrders">
                    <div class="cardHeader">
                        <h2>Recent Orders</h2>
                    </div>

                    <!-- SQL Querry for Recent Order view. -->
                    <?php 
                        $sql = "SELECT * FROM orders limit 5;";
                        $result = mysqli_query($conn, $sql);
                        $resultData = mysqli_num_rows($result);
                    ?>

                    <table>

                        <!-- If there is data print the information per row -->       
                        <?php
                            if ($resultData > 0) {
                                while ($row = mysqli_fetch_array($result)) {
                        ?>

                        <tr>
                            <td>
                                <i class="fa-solid fa-laptop-code"></i>
                                <h4>
                                    <?php
                                        echo $row['ordersService'];
                                    ?>
                                </h4>
                                <span>
                                    <?php
                                        echo $row['ordersNameCustomer'];
                                    ?>
                                </span>
                            </td>
                            <td> 
                                <?php 
                                    if ($row['ordersStatus'] == "Pending") {
                                        echo "<span class='status pending'>Pending</span>";
                                    }
                                    else if ($row['ordersStatus'] == "Delivered") {
                                        echo "<span class='status delivered'>Delivered</span>";
                                    }
                                    else if ($row['ordersStatus'] == "Canceling") {
                                        echo "<span class='status canceling'>Canceling</span>";
                                    }
                                    else if ($row['ordersStatus'] == "InProgress") {
                                        echo "<span class='status inprogress'>In Progress</span>";
                                    }
                                ?>
                            </td>

                        </tr>
                            
                        <?php
                                } // While Close
                            } //If Close
                        ?>

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