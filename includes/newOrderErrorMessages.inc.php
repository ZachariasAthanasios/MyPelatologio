<?php

if(isset($_GET['error'])) {
    if($_GET['error'] == "emptyinput") {
        echo '<p style="color: red; text-align: center;">Fill in all the fields!</p>';
    }
    else if ($_GET['error'] == "invalidemail") {
        echo '<p style="color: red; text-align: center;">Email is invalid!</p>';
    }
}