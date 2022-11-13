<?php require_once "config.php";
if($acctype == "admin"){ 
echo "ELEVATED PRIVELEDGES: $username"?>
<?php
// Include config file
require_once "config.php";
 
// Define variables and initialize with empty values
$uto = $message = $ufrom = "";
$uto_err = $message_err = $ufrom_err = "";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
    // Validate name
    $input_uto = trim($_POST["uto"]);
    if(empty($input_uto)){
        $uto_err = "Please enter a name.";
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
    if(empty($input_ufrom)){
        $ufrom = $username;
    #} elseif(!filter_var($input_uto, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-Z\s]+$/")))){
    #    $uto_err = "Please enter a valid name.";
    } else{
        $ufrom = $input_ufrom;
    }
    
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
                header("location: index.php");
                exit();
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }
        }
         
        // Close statement
        mysqli_stmt_close($stmt);
    }
    
    // Close connection
    mysqli_close($link);
}
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Create Record</title>
    <link rel="icon" type="image/x-icon" href="http://windmillinc.tk/logo.png">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
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
  color: black;
  padding: 12px 16px;
  text-decoration: none;
  display: block;
}

.dropdown a:hover {background-color: #ddd;}

.show {display: block;}
</style>
</head>
<body>
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <h2 class="mt-5">New Message</h2>
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                        <div class="form-group">
                            <label>To</label>
                            <input type="text" name="uto" class="form-control <?php echo (!empty($uto_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $uto; ?>">
                            <span class="invalid-feedback"><?php echo $uto_err;?></span>
                        </div>
                        <div class="form-group">
                            <label>From</label>
                            <input type="text" name="ufrom" class="form-control <?php echo (!empty($ufrom_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $ufrom; ?>">
                            <span class="invalid-feedback"><?php echo $ufrom_err;?></span>
                        </div>
                        <div class="form-group">
                            <label>Message</label>
                            <textarea name="message" class="form-control <?php echo (!empty($message_err)) ? 'is-invalid' : ''; ?>"><?php echo $message; ?></textarea>
                            <span class="invalid-feedback"><?php echo $message_err;?></span>
                        </div>
                        <input type="submit" class="btn btn-primary" value="Submit">
                        <a href="index.php" class="btn btn-secondary ml-2">Cancel</a>
                    </form>
                </div>
            </div>        
        </div>
    </div>
</body>
</html>
<?php } else{?>
    <?php
// Include config file
require_once "config.php";
 
// Define variables and initialize with empty values
$uto = $message = $ufrom = "";
$uto_err = $message_err = $ufrom_err = "";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
    // Validate name
    $input_uto = trim($_POST["uto"]);
    if(empty($input_uto)){
        $uto_err = "Please enter a name.";
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
    
    $ufrom = $username;
    
    // Check input errors before inserting in database
    echo "1";
    if(empty($message_err)){
        // Prepare an insert statement
        $sql = "INSERT INTO messenger (uto, message, ufrom) VALUES (?, ?, ?)";
         echo "2";
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "sss", $param_uto, $param_message, $param_ufrom);
            echo "3";
            // Set parameters
            $param_uto = $uto;
            $param_message = $message;
            $param_ufrom = $ufrom;
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                echo "4";
                // Records created successfully. Redirect to landing page
                header("location: index.php");
                exit();
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }
        }
         
        // Close statement
        mysqli_stmt_close($stmt);
    }
    
    // Close connection
    mysqli_close($link);
}
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Create Record</title>
    <link rel="icon" type="image/x-icon" href="http://windmillinc.tk/logo.png">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
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
  color: black;
  padding: 12px 16px;
  text-decoration: none;
  display: block;
}

.dropdown a:hover {background-color: #ddd;}

.show {display: block;}
</style>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

<script>
    $(function(){
        $("#uto").select2();
    }); 
</script>
</head>
<body>
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <h2 class="mt-5">New Message</h2>
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                        <div class="form-group">
                            <select id="uto" name="uto">  
                                <option value="">To</option>
                                <option value="US">United States of America</option>
                                <?php
// Create connection
$conn = mysqli_connect($DB_SERVER, $DB_USERNAME, $DB_PASSWORD, $DB_NAME);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$sql = "SELECT id, username, aname FROM users";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
        echo "id: " . $row["id"]. " - Name: " . $row["uname"]. " " . $row["aname"]. "<br>";
    }
} else {
    echo "0 results";
}

mysqli_close($conn);
?>
                            </select>
                            <span class="invalid-feedback"><?php echo $uto_err;?></span>
                        </div>
                        <div class="form-group">
                            <label>Message</label>
                            <textarea name="message" class="form-control <?php echo (!empty($message_err)) ? 'is-invalid' : ''; ?>"><?php echo $message; ?></textarea>
                            <span class="invalid-feedback"><?php echo $message_err;?></span>
                        </div>
                        <input type="submit" class="btn btn-primary" value="Submit">
                        <a href="index.php" class="btn btn-secondary ml-2">Cancel</a>
                    </form>
                </div>
            </div>        
        </div>
    </div>
</body>
</html>
<?php }?>