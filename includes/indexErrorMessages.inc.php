<?php

if(isset($_GET['error'])) {
    if($_GET['error'] == "emptyInputs") {
        echo '<p style="color: red;">Fill in all the fields!</p>';
    }
    else if ($_GET['error'] == "InvaliadUsernameAndPassword") {
        echo '<p style="color: red;">Username or password is incorrect!</p>';
    }
}