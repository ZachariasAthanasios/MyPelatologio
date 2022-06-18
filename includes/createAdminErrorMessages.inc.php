<?php

if(isset($_GET['error'])) {
    if($_GET['error'] == "emptyinput") {
        echo '<p style="color: red; text-align: center;">Fill in all the fields!</p>';
    }
    else if ($_GET['error'] == "invalidusername") {
        echo '<p style="color: red; text-align: center;">Username is invalid!</p>';
    }
    else if ($_GET['error'] == "invalidemail") {
        echo '<p style="color: red; text-align: center;">Email is invalid!</p>';
    }
    else if ($_GET['error'] == "userexists") {
        echo '<p style="color: red; text-align: center;">Username or Email is already in use!</p>';
    }
}