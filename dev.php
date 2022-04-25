<?php
// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}
?>

<!DOCTYPE html>
<?php if($_SESSION["username"] == "admin"){ ?>
    <html>
        <head>
            <title>Admin Console</title>
        </head>
        <body>
            <h1>admin</h1>
            <p>
</body>
    </html>
<?php }else{ ?>
    <html>
        <head>
            <title>Webpage</title>
        </head>
        <body>
            <h1>user</h1>>
        </body>
    </html>
<?php } ?>