<?php
    if(isset($_SESSION['email'])){
        include_once('logged_popup.php');
    }
    else{
        include_once('login_popup.php');
    }
?>