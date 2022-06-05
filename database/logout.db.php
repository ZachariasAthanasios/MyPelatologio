<?php 

    session_start();
    session_destroy();
    header("Location: http://localhost/MyPelatologio/index.php?status=logout");

?>