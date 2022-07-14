<?php require_once "config.php";
if($acctype == "admin"){ ?>
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
        $uto_err = "Please enter a name.";
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
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        .wrapper{
            width: 600px;
            margin: 0 auto;
        }
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
                            <textarea name="ufrom" class="form-control <?php echo (!empty($ufrom_err)) ? 'is-invalid' : ''; ?>"><?php echo $ufrom; ?></textarea>
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
    if(empty($uto_err) && empty($message_err)){
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
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        .wrapper{
            width: 600px;
            margin: 0 auto;
        }
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