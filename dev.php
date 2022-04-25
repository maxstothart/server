<!DOCTYPE html>
<?php if($_SESSION["username"] == "admin"){ ?>
    <html>
        <head>
            <title>Admin Console</title>
        </head>
        <body>
            <h1>admin</h1>
</body>
    </html>
<?php }else{ ?>
    <html>
        <head>
            <title>Webpage</title>
        </head>
        <body>
            <h1>user</h1>
        </body>
    </html>
<?php } ?>