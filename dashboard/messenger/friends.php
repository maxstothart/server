<?php require "config.php";
// Define variables and initialize values
$uname1 = $uname2 = "";
$accepted = "2";
$uname1_err = $uname2_err = "";
?>

<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
ul {
  list-style-type: none;
  margin: 0;
  padding: 0;
  overflow: hidden;
  background-color: #333;
}

li {
  float: left;
  border-right:1px solid #bbb;
}

li:last-child {
  border-right: none;
}

li a {
  display: block;
  color: white;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
}

li a:hover:not(.active) {
  background-color: #111;
}

.active {
  background-color: #218838;
}
</style>
<link rel="icon" type="image/x-icon" href="http://windmillinc.tk/logo.png">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">    
</head>
<body style="background-color: #E3E2DE">
<ul>
  <li><a href="https://windmill-inc.com">Home</a></li>
  <li><a href="https://dash.windmill-inc.com">Dash</a></li>
  <li><a href="/messenger">Messenger</a></li>
  <li style="float:right"><a class="active" href="/messenger/friends.php">Friends</a></li>
</ul>
</div>
                    <?php
                    // Attempt select query execution
                    $sql = "SELECT * FROM friends WHERE uname1 = '$username' || uname2 = '$username'";
                    if($result = mysqli_query($link, $sql)){
                        if(mysqli_num_rows($result) > 0){
                          if($row['accepted'] ==  '1'){
                            echo "bob";
                            // Prepare a delete statement
                            $sql1 = "DELETE FROM messenger WHERE id = ";   
                            if($stmt = mysqli_prepare($link, $sql1)){
                            // Bind variables to the prepared statement as parameters
                            mysqli_stmt_bind_param($stmt, "i", $param_id);        
                            // Set parameters
                            $param_id = $row['id'];
                            }
                          }
                            // Free result set
                            mysqli_free_result($result);
                        } else{
                            echo '<div class="alert alert-danger"><em>No Messages were found.</em></div>';
                        }
                    } else{
                        echo "Oops! Something went wrong. Please try again later.";
                    }
 
                    // Close connection
                    //mysqli_close($link);
                    ?>
                </div>
</body>
</html>
