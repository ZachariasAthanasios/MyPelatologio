<?php

    include 'dbh.db.php';
    $id = $_GET['updateid'];
    $sql = "SELECT * FROM admins WHERE adminsID = $id";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);

    $valuefname = $row['adminsFname'];
    $valuelname = $row['adminsLname'];
    $valueemail = $row['adminsEmail'];
    $valuephone = $row['adminsPhone'];
    $valueusername = $row['adminsUsername'];
    $valuepassword = $row['adminsPassword'];
    $valuerole = $row['adminsRole'];

    if (isset($_POST['submit'])) {
        $fname = $_POST['first-name'];
        $lname = $_POST['last-name'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $username = $_POST['username'];
        $password = $_POST['password'];
        $admin_roles = $_POST['admin_roles'];

        if (isset($_GET['updateid'])) {
            $updateID = $_GET['updateid'];

            $sql = "UPDATE admins 
                    SET adminsFname = '$fname', 
                        adminsLname = '$lname', 
                        adminsEmail = '$email', 
                        adminsPhone = '$phone', 
                        adminsUsername = '$username', 
                        adminsPassword = '$password',
                        adminsRole = '$admin_roles'
                    WHERE adminsID = $updateID;";
            
            $result = mysqli_query($conn, $sql);
            if ($result) {
                header("Location: ../admin.php?update=done");
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
    <title>Update Admin</title>

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
                <div class="search">
                    <label>
                        <input type="text" placeholder="Search">
                        <i class="fa-solid fa-magnifying-glass"></i>
                    </label>
                </div>
                    
                <!-- Users Profile Image -->
                <div class="user">
                    <img src="../images/userProfileImage.jpg" alt="User Profile Image">
                </div>
            </div>

            <!-- Create new Admin Form -->
            <div class="details-admin">
                <div class="admins" id="admins">

                    <!-- Form Title -->
                    <div class="cardHeader">
                        <h2>Update Admin</h2>
                    </div>

                    <form action="#" method="POST">

                        <!-- First Name -->
                        <div class="input_field first-name">
                            <label for="first-name-field">First Name</label>
                            <input type="text" class="input" name="first-name" id="first-name-field" value="<?php echo $valuefname ?>">
                        </div>

                        <!-- Last Name -->
                        <div class="input_field">
                            <label for="last-name-field">Last Name</label>
                            <input type="text" class="input" name="last-name" id="last-name-field" value="<?php echo $valuelname ?>">
                        </div>

                        <!-- Email Name -->
                        <div class="input_field">
                            <label for="email-field">Email</label>
                            <input type="email" class="input" name="email" id="email-field" value="<?php echo $valueemail ?>">
                        </div>

                        <!-- Phone -->
                        <div class="input_field">
                            <label for="phone-field">Phone</label>
                            <input type="number" class="input" name="phone" id="phone-field" value="<?php echo $valuephone ?>">
                        </div>

                        <!-- Username -->
                        <div class="input_field">
                            <label for="username-field">Username</label>
                            <input type="text" class="input" name="username" id="username-field" value="<?php echo $valueusername ?>">
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
                            <input type="submit" value="Update Admin" name="submit" class="newAdmin-btn">
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
    <script type="text/javascript" src="../js/main.js"></script>
</body>
</html>