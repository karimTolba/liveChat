<?php

    include("../parts/connection.php");

    session_start();

    $user_id = $_SESSION["user_id"];

    $no_activity = 0;

    $sql = "update login_details set is_active = '$no_activity' where user_id = '$user_id'";

    $conn->query($sql);

    session_destroy();

    header("location:../index.php");


?>