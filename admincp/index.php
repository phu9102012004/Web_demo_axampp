<?php
 session_start();
 if(!isset($_SESSION['dangnhap'])){
    header('Location:login.php');
 }
?>
<!DOCTYPE html>
<html lang="en">
<head>                  
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/admin.css">
    <title>Web</title>  
</head>       
<body> 
    <h1>Welcome to the Web Application</h1>
    <div class="wrapper">
        <?php
            include("config/config.php");
            include("modules/header.php"); 
            include("modules/menu.php"); 
            include("modules/main.php"); 
            include("modules/footer.php"); 
        ?>
    </div>
</body>
</html>