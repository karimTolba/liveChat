<?php

$name = "Sign Up";
$image_path = "../images/sign_up.ico";
$path_css = "../css/sign_up.css";
$path_boot_css = "../bootstrap/css/bootstrap.css";
$path_boot_js = "../bootstrap/js/bootstrap.js";
$js_query_path = "../js/jquery.js";
include("../parts/first_part.php");

?>

<h1 id="app_name">Live Chat app</h1>

    <?php  

        if (isset($_SESSION["failed_message"])) {
            echo "<div class='alert alert-danger text-center'>".$_SESSION["failed_message"]."</div>";
            unset($_SESSION["failed_message"]);
        }
        else if(isset($_SESSION["success_message"])){    
            echo "<div class='alert alert-success text-center'>".$_SESSION["success_message"]."</div>";
            unset($_SESSION["success_message"]);
        }
        else if(isset($_SESSION["required"])){    
            echo "<div class='alert alert-danger text-center'>".$_SESSION["required"]."</div>";
            unset($_SESSION["required"]);
        }
        else if(isset($_SESSION["user_token"])){    
            echo "<div class='alert alert-danger text-center'>".$_SESSION["user_token"]."</div>";
            unset($_SESSION["user_token"]);
        }
    ?>
    <div class="form-group" id="form_container">
        <div id="message"></div>
        <div class="form-group">
            <h3 id="form_title">Sign Up Form</h3>
        </div>
        <form action="../handle_pages/handle_sign_up_page.php" method="POST">
            <div class="form-group">
                <input type="text" name="username" class="form-control" placeholder="Username" id="username">
            </div>
            <div class="form-group">
                <input type="password" name="password" class="form-control" placeholder="Password" id="password">
            </div>
            <div class="form-group" id="submit_group">
                <input type="submit" name="login" value="Resiter" class="btn btn-lg btn-danger" id="register">
                <span> <a href="../index.php">Login</a> </span>
            </div>
        </form>
    </div>
    
<?php

    include("../parts/second_part.php");

?>