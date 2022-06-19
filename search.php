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
    <title>Search Results</title>

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
                    
                <!-- Users Profile Image -->
                <div class="user">
                    <img src="./images/userProfileImage.jpg" alt="User Profile Image">
                </div>
            </div>

            <div class="details-admin">
                <?php 
                    
                    // Admins Detail List
                    if(isset($_GET["submit-search"])) {
                        $search = mysqli_real_escape_string($conn, $_GET['search-field']);
                        $sql = "SELECT * FROM admins WHERE adminsID LIKE '%$search%' OR adminsFname LIKE '%$search%' OR adminsLname LIKE '%$search%'
                                    OR adminsEmail LIKE '%$search%' OR adminsPhone LIKE '%$search%' OR adminsUsername LIKE '%$search%' OR adminsRole LIKE '%$search%';";
                        $result = mysqli_query($conn, $sql);
                        $resultData = mysqli_num_rows($result);

                        if($resultData > 0) {

                            echo "<div class='admins' id='admins'>";
                                echo "<div class='cardHeader'>";
                                    echo "<h2>Results for Admins</h2>";
                                echo "</div>";
                                echo "<table>";
                                    echo "<thead>";
                                        echo "<tr>";
                                            echo "<td>Name</td>";
                                            echo "<td>Email</td>";
                                            echo "<td>Phone</td>";
                                            echo "<td>Username</td>";
                                            echo "<td>Role</td>";
                                            echo "<td><i class='fa-solid fa-pen'> / <i class='fa-solid fa-trash-can'></i></td>";
                                            echo "<td>Create At</td>";
                                        echo "</tr>";
                                    echo "</thead>";
                                    echo "<tbody>";

                                        while ($row = mysqli_fetch_array($result)) {
                                            echo "<tr>";
                                            echo "<td>" .  $row['adminsFname'] . " " . $row['adminsLname'] . "</td>";
                                            echo "<td>" .  $row['adminsEmail'] . "</td>";
                                            echo "<td>" .  $row['adminsPhone'] . "</td>";
                                            echo "<td>" .  $row['adminsUsername'] . "</td>";
                                            echo "<td>" .  $row['adminsRole'] . "</td>";
                                            echo '<td><a href="./database/updateAdmin.db.php?updateid=' . $row['adminsID'] . '"><i class="fa-solid fa-pen"></i></a>
                                                        / 
                                                <a href="./database/deleteAdmin.db.php?deleteid=' . $row['adminsID'] . '"><i class="fa-solid fa-trash-can"></i></a></td>';
                                            echo "<td>" .  $row['adminsCreate_at'] . "</td>";
                                            echo "</tr>";
                                        }
                                    echo "</tbody>";
                                echo "</table>";
                            echo "</div>";
                        }
                    }

                    // Customers Detail List
                    if(isset($_GET["submit-search"])) {
                        $search2 = mysqli_real_escape_string($conn, $_GET['search-field']);
                        $sql2 = "SELECT * FROM customers WHERE customersID LIKE '%$search2%' OR customersFname LIKE '%$search2%' OR customersLname LIKE '%$search2%'
                                    OR customersEmail LIKE '%$search2%' OR customersPhone LIKE '%$search2%' OR customersCompany LIKE '%$search2%' OR customersAddress LIKE '%$search2%'
                                    OR customersLevel LIKE '%$search2%';";
                        $result2 = mysqli_query($conn, $sql2);
                        $resultData2 = mysqli_num_rows($result2);

                        if ($resultData2 > 0) {
                            
                            echo "<div class='admins' id='admins'>";
                                echo "<div class='cardHeader'>";
                                    echo "<h2>Results for Customers</h2>";
                                echo "</div>";
                                echo "<table>";
                                    echo "<thead>";
                                        echo "<tr>";
                                            echo "<td>Name</td>";
                                            echo "<td>Email</td>";
                                            echo "<td>Phone</td>";
                                            echo "<td>Company</td>";
                                            echo "<td>Address</td>";
                                            echo "<td>Level</td>";
                                            echo "<td><i class='fa-solid fa-pen'> / <i class='fa-solid fa-trash-can'></i></td>";
                                            echo "<td>Create At</td>";
                                        echo "</tr>";
                                    echo "</thead>";
                                    echo "<tbody>";

                                        while ($row2 = mysqli_fetch_array($result2)) {
                                            echo "<tr>";
                                            echo "<td>" .  $row2['customersFname'] . " " . $row2['customersLname'] . "</td>";
                                            echo "<td>" .  $row2['customersEmail'] . "</td>";
                                            echo "<td>" .  $row2['customersPhone'] . "</td>";
                                            echo "<td>" .  $row2['customersCompany'] . "</td>";
                                            echo "<td>" .  $row2['customersAddress'] . "</td>";
                                            echo "<td>" .  $row2['customersLevel'] . "</td>";
                                            echo '<td><a href="./database/updateCustomer.db.php?updateid=' . $row2['customersID'] . '"><i class="fa-solid fa-pen"></i></a>
                                                        / 
                                                <a href="./database/deleteCustomer.db.php?deleteid=' . $row2['customersID'] . '"><i class="fa-solid fa-trash-can"></i></a></td>';
                                            echo "<td>" .  $row2['customersCreate_at'] . "</td>";
                                            echo "</tr>";
                                        }
                                    echo "</tbody>";
                                echo "</table>";
                            echo "</div>";
                        }
                    }

                    // Order Detail List
                    if(isset($_GET["submit-search"])) {
                        $search3 = mysqli_real_escape_string($conn, $_GET['search-field']);
                        $sql3 = "SELECT * FROM orders WHERE ordersID LIKE '%$search%' OR ordersService LIKE '%$search%' OR ordersNameCustomer LIKE '%$search%'
                                    OR ordersEmailCustomer LIKE '%$search%' OR ordersStatus LIKE '%$search%' OR ordersReceipt LIKE '%$search%';";
                        $result3 = mysqli_query($conn, $sql3);
                        $resultData3 = mysqli_num_rows($result3);

                        if($resultData3 > 0) {

                            // Admins Detail List
                            echo "<div class='admins' id='admins'>";
                                echo "<div class='cardHeader'>";
                                    echo "<h2>Results for Orders</h2>";
                                echo "</div>";
                                echo "<table>";
                                    echo "<thead>";
                                        echo "<tr>";
                                            echo "<td>Name</td>";
                                            echo "<td>Email</td>";
                                            echo "<td>Phone</td>";
                                            echo "<td>Username</td>";
                                            echo "<td>Role</td>";
                                            echo "<td><i class='fa-solid fa-pen'> / <i class='fa-solid fa-trash-can'></i></td>";
                                            echo "<td>Create At</td>";
                                        echo "</tr>";
                                    echo "</thead>";
                                    echo "<tbody>";

                                        while ($row3 = mysqli_fetch_array($result3)) {
                                            echo "<tr>";
                                            echo "<td>" .  $row3['ordersService'] . "</td>";
                                            echo "<td>" .  $row3['ordersNameCustomer'] . "</td>";
                                            echo "<td>" .  $row3['ordersEmailCustomer'] . "</td>";
                                            echo "<td>" .  $row3['ordersStatus'] . "</td>";
                                            echo "<td>" .  $row3['ordersReceipt'] . "</td>";
                                            echo '<td><a href="./database/updateOrder.db.php?updateid=' . $row3['ordersID'] . '"><i class="fa-solid fa-pen"></i></a>
                                                        / 
                                                <a href="./database/deleteOrder.db.php?deleteid=' . $row3['ordersID'] . '"><i class="fa-solid fa-trash-can"></i></a></td>';
                                            echo "<td>" .  $row3['ordersCreate_at'] . "</td>";
                                            echo "</tr>";
                                        }
                                    echo "</tbody>";
                                echo "</table>";
                            echo "</div>";
                        }
                    }
                ?>
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