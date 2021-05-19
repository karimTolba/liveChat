<?php

    include("../parts/connection.php");

    $sql_login = "select * from login_details";

    $results = $conn->query($sql_login);

    $emparray = array();

    while($row =mysqli_fetch_assoc($results))
    {
        $emparray[] = $row;
    }

    $sql_information = "select * from user_information";

    $results_info = $conn->query($sql_information);

    $emparray2 = array();
    
    while($row =mysqli_fetch_assoc($results_info))
    {
        $emparray2[] = $row;
    }

    echo json_encode(array_merge($emparray , $emparray2));
    

?>