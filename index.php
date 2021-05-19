<?php

$name = "Login Page";
$image_path = "images/login.ico";
$path_css = "css/login_page.css";
$path_boot_css = "bootstrap/css/bootstrap.css";
$path_boot_js = "bootstrap/js/bootstrap.js";
$js_query_path = "js/jquery.js";
include("parts/first_part.php");

?>
    <h1 id="app_name">Live Chat app</h1>
    <div class="form-group" id="form_container">
        <div class="form-group">
            <h3 id="form_title">Login Form</h3>
        </div>
        <form action="handle_pages/handle_login_page.php" method="POST">
            <div class="form-group">
                <input type="text" name="username" class="form-control" placeholder="Username" id="username">
            </div>
            <div class="form-group">
                <input type="password" name="password" class="form-control" placeholder="Password">
            </div>
            <input type="text" id="time_login" name="time_login" hidden>
            <div class="form-group" id="submit_group">
                <input type="submit" name="login" value="login" class="btn btn-lg btn-info" id="login">
                <span id="">if you are not register  , <a href="pages/sign_up_page.php">Sign Up</a></span>
            </div>
        </form>
    </div>
    
    <script src="js/login.js"></script>

<?php

    include("parts/second_part.php");

?>