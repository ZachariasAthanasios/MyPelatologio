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
    <title>Orders | MyPelatologio</title>

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

            <!-- Orders Detail List -->
            <div class="details-customer">

                <?php 
                    $sql = "SELECT * FROM orders;";
                    $result = mysqli_query($conn, $sql);
                    $resultData = mysqli_num_rows($result);
                ?>

                <div class="customers" id="customers">
                    <div class="cardHeader">
                        <h2>Orders</h2>
                        <a href="newOrder.php" class="btn-view_all">New Order</a>
                    </div>

                    <!-- List -->
                    <table>
                        <thead>
                            <tr>
                                <td>Service</td>
                                <td>Name</td>
                                <td>Email</td>
                                <td>Status</td>
                                <td>Receipt</td>
                                <td>Create At</td>
                            </tr>
                        </thead>
                        <tbody>

                            <?php
                                if ($resultData > 0) {
                                    while ($row = mysqli_fetch_array($result)) {
                            ?>

                            <tr>
                                <td>
                                    <?php
                                        echo $row['ordersService'];
                                    ?>
                                </td>
                                <td>
                                    <?php
                                        echo $row['ordersNameCustomer'];
                                    ?>
                                </td>
                                <td>
                                    <?php
                                        echo $row['ordersEmailCustomer'];
                                    ?>
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
                                <td>
                                    <?php
                                        echo $row['ordersReceipt'] . "€";
                                    ?>
                                </td>
                                <td>
                                    <?php
                                        echo $row['ordersCreate_at'];
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