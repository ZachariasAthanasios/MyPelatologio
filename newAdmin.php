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
    <title>Create Admin</title>

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

            <!-- Create new Admin Form -->
            <div class="details-admin">
                <div class="admins" id="admins">

                    <!-- Form Title -->
                    <div class="cardHeader">
                        <h2>New Admin</h2>
                    </div>

                    <form action="./database/newAdmin.db.php" method="POST">

                        <!-- First Name -->
                        <div class="input_field first-name">
                            <label for="first-name-field">First Name</label>
                            <input type="text" class="input" name="first-name" id="first-name-field">
                        </div>

                        <!-- Last Name -->
                        <div class="input_field">
                            <label for="last-name-field">Last Name</label>
                            <input type="text" class="input" name="last-name" id="last-name-field">
                        </div>

                        <!-- Email Name -->
                        <div class="input_field">
                            <label for="email-field">Email</label>
                            <input type="email" class="input" name="email" id="email-field">
                        </div>

                        <!-- Phone -->
                        <div class="input_field">
                            <label for="phone-field">Phone</label>
                            <input type="number" class="input" name="phone" id="phone-field">
                        </div>

                        <!-- Username -->
                        <div class="input_field">
                            <label for="username-field">Username</label>
                            <input type="text" class="input" name="username" id="username-field">
                        </div>

                        <!-- Password -->
                        <div class="input_field">
                            <label for="password-field">Password</label>
                            <input type="password" class="input" name="password" id="password-field">
                        </div>

                        <!-- Admin Role -->
                        <div class="input_field">
                            <label for="admin-roles">Role</label>
                            <select name="admin_roles" id="admin-roles">
                                <option value="SuperAdmin">Super Admin</option>
                                <option value="Admin">Admin</option>
                                <option value="Member">Member</option>
                            </select>
                        </div>

                        <!-- Submit Button -->
                        <div class="input-field">
                            <input type="submit" value="Create Admin" name="submit" class="newAdmin-btn">
                        </div>

                        <!-- Error Messages -->
				        <?php include ('includes/createAdminErrorMessages.inc.php'); ?>
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