<?php require_once "config.php";?>
<?php
// Check existence of id parameter before processing further
if(isset($_GET["id"]) && !empty(trim($_GET["id"]))){
    // Include config file
    require_once "config.php";
    
    // Prepare a select statement
    $sql = "SELECT * FROM messenger WHERE id = ?";
    
    if($stmt = mysqli_prepare($link, $sql)){
        // Bind variables to the prepared statement as parameters
        mysqli_stmt_bind_param($stmt, "i", $param_id);
        
        // Set parameters
        $param_id = trim($_GET["id"]);
        
        // Attempt to execute the prepared statement
        if(mysqli_stmt_execute($stmt)){
            $result = mysqli_stmt_get_result($stmt);
    
            if(mysqli_num_rows($result) == 1){
                    /* Fetch result row as an associative array. Since the result set
                    contains only one row, we don't need to use while loop */
                    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
                
                    // Retrieve individual field value
                    $uto = $row["uto"];
                    $message = $row["message"];
                    $ufrom = $row["ufrom"];
                } else{
                // URL doesn't contain valid id parameter. Redirect to error page
                header("location: error.php");
                exit();
            }
            
        } else{
            echo "Oops! Something went wrong. Please try again later.";
        }
    }
     
    // Close statement
    mysqli_stmt_close($stmt);
    
    // Close connection
    mysqli_close($link);
} else{
    // URL doesn't contain id parameter. Redirect to error page
    header("location: error.php");
    exit();
}
?>
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <h1 class="mt-5 mb-3">View Message</h1>
                    <div class="form-group">
                        <label>To</label>
                        <p><b><?php echo $row["uto"]; ?></b></p>
                    </div>
                    <div class="form-group">
                        <label>From</label>
                        <p><b><?php echo $row["ufrom"]; ?></b></p>
                    </div>
                    <div class="form-group">
                        <label>Message</label>
                        <p><b><?php echo $row["message"]; ?></b></p>
                    </div>
                    <p><a onClick="closepopup()" class="btn btn-primary">Back</a></p>
                </div>
            </div>        
        </div>
    </div>