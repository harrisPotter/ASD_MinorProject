<?php

    session_start();
    include('function.php');


    $_SESSION['user_id'] = null;
    header("location: login.php");
?>