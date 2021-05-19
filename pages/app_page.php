<?php
    $name = "Login Page";
    $image_path = "../images/login.ico";
    $path_css = "../css/login_page.css";
    $path_boot_css = "../bootstrap/css/bootstrap.css";
    $path_boot_js = "../bootstrap/js/bootstrap.js";
    $js_query_path = "../js/jquery.js";
    include("../parts/first_part.php");

    if(isset($_SESSION["user_id"]))
        $user_id = $_SESSION["user_id"];

?>

    <div>

        <a href="../handle_pages/logout.php">LogOut</a>

    </div>

    <h3 style="text-align: center;margin : 50px auto;max-width : 300px">welcome to our app</h3>

    <table class="table table-dark table-bordered text-center">
        <thead>
            <tr>
                <th scope="col">name</th>
                <th scope="col">status</th>
                <th scope="col">last activity</th>
                <th id="user_id" hidden><?php 

                    if(isset($user_id))
                        echo $user_id;
                    else
                        echo "empty";

                ?></th>
            </tr>
        </thead>
        <tbody id="tbody">
       
        </tbody>
    </table>

    <script>

        const tbody = document.getElementById("tbody");
        
        const us_id = document.getElementById("user_id");    

        let flag_function = false;

        function ex(){

            if(flag_function == false){

            flag_function = true;        

            $.get(
                "../handle_pages/handle_app_page.php" , 
                (data)=>{

                    const arr = JSON.parse(data);
                    let start = "";
                    let arr_login_details = [];
                    let arr_user_info = [];
                    let flag_arr = false;

                    for(let i = 0 ; i < arr.length ; i++){

                        if(arr[i].user_id == start){
                            flag_arr = true;
                        }    

                        if(i == 0)
                            start = arr[0].user_id;

                        if (flag_arr == false){
                            if(arr[i].user_id != us_id.innerHTML)
                                arr_login_details.push(arr[i]);
                        }
                        else{
                            if(arr[i].user_id != us_id.innerHTML)
                            arr_user_info.push(arr[i]);
                        }            

                    }

                    for(let i = 0 ; i < arr_login_details.length ; i++){

                        for(let x = 0 ; x < arr_user_info.length ; x++){

                            if(arr_login_details[i].user_id != us_id.innerHTML){

                                if(arr_login_details[i].user_id == arr_user_info[x].user_id){

                                    let td_name = document.createElement("td");
                                    let anchor_name = document.createElement("a");
                                    let td_name_text = document.createTextNode(arr_user_info[i].user_name);
                                    anchor_name.setAttribute("href" , `chat_messages.php?user_id=${arr_user_info[x].user_id}`);
                                    anchor_name.appendChild(td_name_text);
                                    td_name.appendChild(anchor_name);

                                    let td_status = document.createElement("td");
                                    td_status.setAttribute("class" , "status");
                                    let td_status_text = document.createTextNode(arr_login_details[i].is_active == "1" ? "online" : "offline");
                                    td_status.appendChild(td_status_text);

                                    let td_last_activity = document.createElement("td");
                                    let td_last_activity_text = document.createTextNode(arr_login_details[i].time_login);
                                    td_last_activity.appendChild(td_last_activity_text);

                                    let tr = document.createElement("tr");

                                    tr.setAttribute("id" , arr_user_info[x].user_id);

                                    tr.appendChild(td_name);
                                    tr.appendChild(td_status);
                                    tr.appendChild(td_last_activity);

                                    tbody.appendChild(tr);

                                }

                        }

                        }

                    }
                    
                    let status = document.getElementsByClassName("status");

                    for(let z = 0 ; z < status.length;z++){

                        if(status[z].innerHTML == "online")
                            status[z].style.color = "green";
                        else
                            status[z].style.color = "red";    

                    }

                
                });

            }

            else{

                $.get(
                "../handle_pages/handle_app_page.php" , 
                (data)=>{

                    const arr = JSON.parse(data);
                    let start = "";
                    let arr_login_details = [];
                    let arr_user_info = [];
                    let flag_arr = false;

                    for(let i = 0 ; i < arr.length ; i++){

                        if(arr[i].user_id == start){
                            flag_arr = true;
                        }    

                        if(i == 0)
                            start = arr[0].user_id;

                        if (flag_arr == false){
                            if(arr[i].user_id != us_id.innerHTML)
                                arr_login_details.push(arr[i]);
                        }
                        else{
                            if(arr[i].user_id != us_id.innerHTML)
                                arr_user_info.push(arr[i]);
                        }            
  
                                    

                    }

                    for(let i = 0 ; i < arr_login_details.length ; i++){

                        for(let x = 0 ; x < arr_user_info.length ; x++){

                            if(arr_login_details[i].user_id == arr_user_info[x].user_id){

                                document.getElementById(arr_user_info[x].user_id).childNodes[1].innerHTML = arr_login_details[i].is_active == "1" ? "online" : "offline";
                                document.getElementById(arr_user_info[x].user_id).childNodes[2].innerHTML = arr_login_details[i].time_login;

                            }

                        }

                    }

                }

                );

                let status = document.getElementsByClassName("status");

                for(let z = 0 ; z < status.length;z++){

                    if(status[z].innerHTML == "online")
                        status[z].style.color = "green";
                    else
                        status[z].style.color = "red";    

                }


            }

        }

        setInterval( ex , 2000);
        
    </script>

<?php

 include("../parts/second_part.php");

?>