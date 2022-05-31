<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Meta tags -->
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="MyCMS">
    <meta name="keywords" content="CMS, MyCMS, HTML, CSS, JavaScript, PHP, MySQL">
    <meta name="author" content="Zacharias Athanasios">

    <!-- Page Title -->
    <title>Dashboard | MyPelatologio</title>

    <!-- Font-Awesome CDN Link 6.1.1 -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- Custom CSS File Link -->
    <link rel="stylesheet" href="styles/style.css">
</head>
<body>
    <div class="container-dashboard">
        
        <!-- Navbar Menu -->
        <?php include ('includes/sidebar.php'); ?>

        <!-- Main -->
        <div class="main">

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
                    <img src="./images/userProfileImage.jpg" alt="User Profile Image" width="100" height="100">
                </div>
            </div>

            <!-- Information Cards -->
            <div class="cardBox">

                <!-- Card #1 -->
                <div class="card">
                    <div>
                        <div class="numbers">1.504</div>
                        <div class="cardName">Daily Views</div>
                    </div>
                    <div class="iconBox">
                        <i class="fa-solid fa-eye"></i>
                    </div>
                </div>

                <!-- Card #2 -->
                <div class="card">
                    <div>
                        <div class="numbers">1.504</div>
                        <div class="cardName">Daily Views</div>
                    </div>
                    <div class="iconBox">
                        <i class="fa-solid fa-eye"></i>
                    </div>
                </div>

                <!-- Card #3 -->
                <div class="card">
                    <div>
                        <div class="numbers">1.504</div>
                        <div class="cardName">Daily Views</div>
                    </div>
                    <div class="iconBox">
                        <i class="fa-solid fa-eye"></i>
                    </div>
                </div>

                <!-- Card #4 -->
                <div class="card">
                    <div>
                        <div class="numbers">1.504</div>
                        <div class="cardName">Daily Views</div>
                    </div>
                    <div class="iconBox">
                        <i class="fa-solid fa-eye"></i>
                    </div>
                </div>
            </div>

            <!-- Details List -->

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