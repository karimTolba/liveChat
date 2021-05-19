<?php 

    session_start();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $name;?></title>
    <script src=<?php echo $path_boot_js; ?>></script>
    <link rel="stylesheet" href=<?php echo $path_boot_css; ?>>
    <link rel="stylesheet" href=<?php echo $path_css; ?>>
    <link rel="icon" href=<?php echo $image_path; ?>>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@500&display=swap" rel="stylesheet">
    <script src=<?php echo $js_query_path ?> ></script> 
</head>
<body>