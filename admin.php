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
    <title>Admin | MyPelatologio</title>

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

            <!-- Admins Detail List -->
            <div class="details-admin">

                <!-- SQL Querry for Admin view. -->
                <?php 
                    $sql = "SELECT * FROM admins;";
                    $result = mysqli_query($conn, $sql);
                    $resultData = mysqli_num_rows($result);
                ?>

                <!-- Admins Detail List -->
                <div class="admins" id="admins">
                    <div class="cardHeader">
                        <h2>Admins</h2>
                        <a href="./newAdmin.php" class="btn-view_all">New Admin</a>
                    </div>
                    <table>
                        <thead>
                            <tr>
                                <td>Name</td>
                                <td>Email</td>
                                <td>Phone</td>
                                <td>Username</td>
                                <td>Role</td>
                                <td><i class="fa-solid fa-pen"> / <i class="fa-solid fa-trash-can"></i></td>
                                <td>Create At</td>
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
                                            echo $row['adminsFname'] . " " . $row['adminsLname'];
                                        ?>
                                    </td>
                                    <td>
                                        <?php
                                            echo $row['adminsEmail'];
                                        ?>
                                    </td>
                                    <td>
                                        <?php
                                            echo $row['adminsPhone'];
                                        ?>
                                    </td>
                                    <td>
                                        <?php
                                            echo $row['adminsUsername'];
                                        ?>
                                    </td>
                                    <td>
                                        <?php
                                            echo $row['adminsRole'];
                                        ?>
                                    </td>
                                    <td>
                                        <?php
                                            echo '<a href="./database/updateAdmin.db.php?updateid=' . $row['adminsID'] . '"><i class="fa-solid fa-pen"></i></a>
                                                 / 
                                                 <a href="./database/deleteAdmin.db.php?deleteid=' . $row['adminsID'] . '"><i class="fa-solid fa-trash-can"></i></a>'
                                        ?>
                                    </td>
                                    <td>
                                        <?php
                                            echo $row['adminsCreate_at'];
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