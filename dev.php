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
            <h1>user</h1>
            <p><b><?php echo htmlspecialchars($_SESSION["username"]); ?></b></p>
        </body>
    </html>
<?php } ?>