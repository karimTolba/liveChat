<?php

    $name = "Login Page";
    $image_path = "../images/login.ico";
    $path_css = "../css/chat_messages.css";
    $path_boot_css = "../bootstrap/css/bootstrap.css";
    $path_boot_js = "../bootstrap/js/bootstrap.js";
    $js_query_path = "../js/jquery.js";
    include("../parts/first_part.php");


?>

<div id="flex-container">
  <div id="messages">



  </div>
  <div id="text_messages">


  </div>  
</div>

<?php

    include("../parts/second_part.php");

?>