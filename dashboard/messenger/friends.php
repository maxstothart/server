<?php require "config.php";?>
// Define variables and initialize with empty values
$uname1 = $uname2 = "";
$accepted = "2";
$uname1_err = $uname2_err = "";


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
                    $sql = "SELECT * FROM messenger";
                    if($result = mysqli_query($link, $sql)){
                        if(mysqli_num_rows($result) > 0){
                            echo '<table class="table table-bordered table-striped">';
                                echo "<thead>";
                                    echo "<tr>";
                                        echo "<th>#</th>";
                                        echo "<th>To</th>";
                                        echo "<th>From</th>";
                                        echo "<th>Message</th>";
                                        echo "<th>Action</th>";
                                    echo "</tr>";
                                echo "</thead>";
                                echo "<tbody>";
                                while($row = mysqli_fetch_array($result)){
                                    echo "<tr>";
                                        echo "<td>" . $row['id'] . "</td>";
                                        echo "<td>" . $row['uto'] . "</td>";
                                        echo "<td>" . $row['ufrom'] . "</td>";
                                        echo "<td>" . $row['message'] . "</td>";
                                        echo "<td>";
                                            echo '<a id="readmessage" class="viewmessage mr-3" title="View Message" data-toggle="tooltip" data-id="' . $row['id'] . '"><span class="fa fa-eye"></span></a>';
                                            echo '<a class="delmessage" title="Delete Message" data-toggle="tooltip" data-id="' . $row['id'] . '"><span class="fa fa-trash"></span></a>';echo "</td>";
                                    echo "</tr>";
                                }
                                echo "</tbody>";                            
                            echo "</table>";
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
