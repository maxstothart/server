<?php require_once "config.php";
if($acctype == "admin"){ 
    echo "  ELEVATED PRIVELEDGES: $username"?>
<?php
// Include config file
require "config.php";
 
// Define variables and initialize with empty values
$uto = $message = $ufrom = "";
$uto_err = $message_err = $ufrom_err = "";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
    // Validate name
    $input_uto = trim($_POST["uto"]);
    if(empty($input_uto)){
        $uto_err = "Please enter a recipient.";
    #} elseif(!filter_var($input_uto, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-Z\s]+$/")))){
    #    $uto_err = "Please enter a valid name.";
    } else{
        $uto = $input_uto;
    }
    
    // Validate address
    $input_message = trim($_POST["message"]);
    if(empty($input_message)){
        $message_err = "Please enter an message.";
    } else{
        $message = $input_message;
    }
    
    $input_ufrom = trim($_POST["ufrom"]);
        $ufrom = $input_ufrom;
    
    
    // Check input errors before inserting in database
    if(empty($uto_err) && empty($message_err) && empty($ufrom_err)){
        // Prepare an insert statement
        $sql = "INSERT INTO messenger (uto, message, ufrom) VALUES (?, ?, ?)";
         
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "sss", $param_uto, $param_message, $param_ufrom);
            
            // Set parameters
            $param_uto = $uto;
            $param_message = $message;
            $param_ufrom = $ufrom;
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Records created successfully. Redirect to landing page
                header('Location: '."/messenger");
                exit();
                //return();
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }
            exit();
        }
         
        // Close statement
    }
    
    // Close connection
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Messenger</title>
    <link rel="icon" type="image/x-icon" href="http://windmillinc.tk/logo.png">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
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
  border-radius: 15px;
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
        .wrapper{
            width: 600px;
            margin: 0 auto;
        }
        table tr td:last-child{
            width: 120px;
        }
    </style>
    <style>
        .wrapper{
            width: 600px;
            margin: 0 auto;
        }
.dropbtn {
  background-color: #04AA6D;
  color: white;
  padding: 16px;
  font-size: 16px;
  border: none;
  cursor: pointer;
}

.dropbtn:hover, .dropbtn:focus {
  background-color: #3e8e41;
}

#myInput {
  box-sizing: border-box;
  background-image: url('searchicon.png');
  background-position: 14px 12px;
  background-repeat: no-repeat;
  font-size: 16px;
  padding: 14px 20px 12px 45px;
  border: none;
  border-bottom: 1px solid #ddd;
}

#myInput:focus {outline: 3px solid #ddd;}

.dropdown {
  position: relative;
  display: inline-block;
}

.dropdown-content {
  display: none;
  position: absolute;
  background-color: #f6f6f6;
  min-width: 230px;
  overflow: auto;
  border: 1px solid #ddd;
  z-index: 1;
}

.dropdown-content a {
  color: white;
  padding: 12px 16px;
  text-decoration: none;
  display: block;
}

.dropdown a:hover {background-color: #ddd;}

.show {display: block;}
</style>
    <style>
        .popup { display: none; position: fixed; top: 12%; left: 15%; width: 70%; height: 70%; background-color: white; z-index: 10; border-radius: 25px; }
        .popup iframe { width: 100%; height: 100%; border: 0; }
        .popupdarkbg { position: fixed; z-index: 5; left: 0; top: 0; width: 100%; height: 100%; overflow: hidden; background-color: rgba(0,0,0,.75); display: none; }
    </style>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

    <script>
        $(document).ready(function(){
            $('[data-toggle="tooltip"]').tooltip();   
        });
    </script>
</head>
<body style="background-color: #E3E2DE">
    <script>
        $(document).ready(function() {
            $('.dbox').select2();
        });
    </script>
    <ul>
        <li><a href="https://windmill-inc.com">Home</a></li>
        <li><a href="/">Dash</a></li>
        <li><a href="/messenger">Messenger</a></li>
        <li style="float:right"><a class="active" href="/messenger/friends/">Friends</a></li>
    </ul>
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="mt-5 mb-3 clearfix">
                        <h2 class="pull-left">Messages</h2>
                        <a href="" id="message" class="addfriend btn btn-success pull-right"><i class="fa fa-plus"></i> New Message</a>
                        <div id="popup" class="popup" style="background-color: #E3E2DE">   
                        </div>
                        <div id="popupdarkbg" class="popupdarkbg"></div>
                    </div>
                    <?php
                    // Attempt select query execution
                    $sql = "SELECT * FROM friends WHERE uname1 = '$username' || uname2 = '$username'";
                    if($result = mysqli_query($link, $sql)){
                        if(mysqli_num_rows($result) > 0){
                            echo '<table class="table table-bordered table-striped">';
                                echo "<thead>";
                                    echo "<tr>";
                                        echo "<th>#</th>";
                                        echo "<th>uname1</th>";
                                        echo "<th>uname2</th>";
                                        echo "<th>accepted</th>";
                                        echo "<th>Action</th>";
                                    echo "</tr>";
                                echo "</thead>";
                                echo "<tbody>";
                                while($row = mysqli_fetch_array($result)){
                                    echo "<tr>";
                                        echo "<td>" . $row['id'] . "</td>";
                                        echo "<td>" . $row['uname1'] . "</td>";
                                        echo "<td>" . $row['uname2'] . "</td>";
                                        echo "<td>" . $row['accepted'] . "</td>";
                                        echo "<td>";
                                            if ($row['accepted'] == 1) {
                                                echo $row['id'];
                                                echo '<a id="acceptfriend" class="acceptfriend mr-3" title="View Message" data-toggle="tooltip" data-id="' . $row['id'] . '"><span class="fa fa-eye"></span></a>';
                                            } elseif ($row['accepted'] == 2) {
                                                echo$row['id'];
                                                echo '<a class="removefriend" title="Delete Message" data-toggle="tooltip" data-id="' . $row['id'] . '"><span class="fa fa-trash"></span></a>';echo "</td>";
                                            }
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
            </div>        
        </div>
    </div>
    <script type="text/javascript">
                        function closepopup() {
                            document.getElementById("popup").style.display = "none";
                            document.getElementById("popupdarkbg").style.display = "none";
                            e.preventDefault();
                            return;
                        }
                        for (let el of document.querySelectorAll(".addfriend")) {
                        el.addEventListener("click", async function(e) {
                            e.preventDefault();
                            let response = await fetch("add.php")
                            document.getElementById("popup").innerHTML = await response.text();
                            document.getElementById("popupdarkbg").style.display = "block";
                            document.getElementById("popup").style.display = "block";
                            document.getElementById('popupdarkbg').onclick = function() {
                                document.getElementById("popup").style.display = "none";
                                document.getElementById("popupdarkbg").style.display = "none";
                            };
                            return false;
                        });}
                        for (let el of document.querySelectorAll(".acceptfriend")) {
                        el.addEventListener("click", async function(e) {
                            e.preventDefault();
                            let response = await fetch("accept.php?id="+e.target.parentElement.dataset.id)
                            document.getElementById("popup").innerHTML = await response.text();
                            document.getElementById("popupdarkbg").style.display = "block";
                            document.getElementById("popup").style.display = "block";
                            document.getElementById('popupdarkbg').onclick = function() {
                                document.getElementById("popup").style.display = "none";
                                document.getElementById("popupdarkbg").style.display = "none";
                            };
                            return false;
                        });}
                        for (let el of document.querySelectorAll(".removefriend")) {
                        el.addEventListener("click", async function(e) {
                            e.preventDefault();
                            let response = await fetch("block.php?id="+e.target.parentElement.dataset.id)
                            document.getElementById("popup").innerHTML = await response.text();
                            document.getElementById("popupdarkbg").style.display = "block";
                            document.getElementById("popup").style.display = "block";
                            document.getElementById('popupdarkbg').onclick = function() {
                                document.getElementById("popup").style.display = "none";
                                document.getElementById("popupdarkbg").style.display = "none";
                            };
                            return false;
                        });}
                        window.onkeydown = function(e) {
                            if (e.keyCode == 27) {
                            closepopup();
                            }
                        }
                    </script>
</body>
</html>
<?php }else{ ?>
<?php } ?>