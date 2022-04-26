<?php
// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
} elseif (isset($_GET['reboot'])) {
    exec("sudo reboot");
    header('Location: index.php');
} elseif (isset($_GET['restart'])) {
    exec("sudo systemctl restart apache2.service")
    header('Location: index.php');
} elseif (isset($_GET['update'])) {
    exec("updateserver");
    header('Location: index.php');
}
?>

<!DOCTYPE html>
<?php if($_SESSION["username"] == "admin"){ ?>
    <html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Console</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body{ font: 14px sans-serif; text-align: center; }
    </style>
</head>
<body>
    <h1 class="my-5">Hi, <b>Admin</b>. What do you want to do</h1>
    <p>
        <a href='?reboot=true' class="btn btn-danger ml-3">restart pi</a>
        <a href="?restart=true" class="btn btn-danger ml-3">restart server</a>

    </p>
    <p>
        <a href='?update=true' class="btn btn-warning">update server</a>
        <a href="logout.php" class="btn btn-warning">Sign Out</a>

    </p>
</body>
</html>
<?php }else{ ?>
    <html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Welcome</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body{ font: 14px sans-serif; text-align: center; }
    </style>
</head>
<body>
    <h1 class="my-5">Hi, <b><?php echo htmlspecialchars($_SESSION["username"]); ?></b>. Welcome to Windmill INC</h1>
    <p>
        <a href="reset-password.php" class="btn btn-warning">Reset Your Password</a>
        <a href="logout.php" class="btn btn-danger ml-3">Sign Out of Your Account</a>
    </p>
</body>
</html>
<?php } ?>
