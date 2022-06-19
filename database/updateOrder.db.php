<?php 

include 'dbh.db.php';
$id = $_GET['updateid'];
$sql = "SELECT * FROM orders WHERE ordersID = $id";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);

    $valueservice = $row['ordersService'];
    $valuecname = $row['ordersNameCustomer'];
    $valuecemail = $row['ordersEmailCustomer'];
    $valuestatus = $row['ordersStatus'];
    $valuereceipt = $row['ordersReceipt'];

    if (isset($_POST['submit'])) {
        $service = $_POST['service'];
        $cname = $_POST['customer-name'];
        $cemail = $_POST['cemail'];
        $status = $_POST['order_status'];
        $receipt = $_POST['receipt'];

        if (isset($_GET['updateid'])) {
            $updateID = $_GET['updateid'];

            $sql = "UPDATE orders 
                    SET ordersService = '$service', 
                        ordersNameCustomer = '$cname', 
                        ordersEmailCustomer = '$cemail', 
                        ordersStatus = '$status', 
                        ordersReceipt = '$receipt'
                    WHERE ordersID = $updateID;";
            
            $result = mysqli_query($conn, $sql);
            if ($result) {
                header("Location: ../order.php?update=done");
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
    <title>Update Order</title>

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
                <?php include ('../includes/search.inc.php'); ?>
                    
                <!-- Users Profile Image -->
                <div class="user">
                    <img src="../images/userProfileImage.jpg" alt="User Profile Image">
                </div>
            </div>

            <!-- Create new Admin Form -->
            <div class="details-order">
                <div class="orders" id="orders">

                    <!-- Form Title -->
                    <div class="cardHeader">
                        <h2>Update Order</h2>
                    </div>

                    <form method="POST">

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
                            <input type="text" name="customer-name" class="input" id="customer-name-field" value="<?php echo $valuecname ?>">
                        </div>

                        <!-- Customer Email -->
                        <div class="input_field">
                            <label for="email-field">Customer Email</label>
                            <input type="email" name="cemail" class="input" id="email-field" value="<?php echo $valuecemail ?>">
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
                            <input type="number" name="receipt" class="input" id="receipt-field" value="<?php echo $valuereceipt ?>">
                        </div>

                        <!-- Submit Button -->
                        <div class="input-field">
                            <input type="submit" value="Update Order" name="submit" class="newOrder-btn">
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