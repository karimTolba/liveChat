<?php

 session_start();

include("../parts/connection.php");

$username = $_POST["username"];
$password = $_POST["password"];

if($password != "" || $username != ""){

    $sql_first = "select user_name from user_information";

    $results = $conn->query($sql_first);

    $user_flag = false;

    foreach($results as $result){
        
        if($username == $result["user_name"])
            $user_flag = true;

    }

    if ($user_flag == false) {

            $password = password_hash($password, PASSWORD_DEFAULT);

            $sql = "insert into user_information (user_name , user_password) values ('$username' , '$password')";

            $conn->query($sql);

            $_SESSION["success_message"] = "Your data stored successfully".$result;
            header("location:../pages/sign_up_page.php");
    }
    
    else{
     
        $_SESSION["user_token"] = "username token";
        header("location:../pages/sign_up_page.php");

    }
}

else{

    $_SESSION["required"] = "password and username are required";
    header("location:../pages/sign_up_page.php");   

}
