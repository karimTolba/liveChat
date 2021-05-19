<?php

session_start();

include("../parts/connection.php");

$user_name = $_POST["username"];
$password = $_POST["password"];
$time_login = $_POST["time_login"];

if($user_name == "" || $password == "")
    echo "empty";
else{
    $sql = "select * from user_information where user_name = '$user_name'";

    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $result_array = $result->fetch_all();

        foreach($result_array as $re_arr){

            $user_id = $re_arr[0];
            $active = 1;

            if (password_verify($password, $re_arr[2])) {

                echo "logined";

                $_SESSION["user_id"] = $user_id;

                $sql_check_login = "select * from login_details where user_id = '$user_id'";

                $result = $conn->query($sql_check_login);

                if($result->num_rows == 0){

                    $sql_insert_data = "insert into login_details (user_id , is_active , time_login) values ('$user_id' , '$active' , '$time_login')";

                    $conn->query($sql_insert_data);

                    $_SESSION["user_id"] = $user_id;

                    header("location:../pages/app_page.php");

                }

                else{

                    $_SESSION["user_id"] = $user_id;

                    $sql_update_data = "update login_details set time_login = '$time_login' , is_active = '$active' where user_id = '$user_id'";

                    if($conn->query($sql_update_data)){

                        $_SESSION["user_id"] = $user_id;

                        header("location:../pages/app_page.php");

                    }
                        
                    else
                        echo "no";    

                }
                
            }
            else
                echo $re_arr[2];

        }
            
    }

    else{


        echo "false results";    


    }

}