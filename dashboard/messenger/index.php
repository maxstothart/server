<?php require_once "config.php";
if($acctype == "admin"){ 
    echo "ELEVATED PRIVELEDGES: $username"?>
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
        #popup { display: none; position: fixed; top: 12%; left: 15%; width: 70%; height: 70%; background-color: white; z-index: 10; }
        #popup iframe { width: 100%; height: 100%; border: 0; }
        #popupdarkbg { position: fixed; z-index: 5; left: 0; top: 0; width: 100%; height: 100%; overflow: hidden; background-color: rgba(0,0,0,.75); display: none; }
    </style>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

    <script>
        $(document).ready(function(){
            $('[data-toggle="tooltip"]').tooltip();   
        });
    </script>
    <script>
    $(function(){
        $("#dbox").select2();
    }); 

    $(function(){
        $("#dbox2").select2();
    }); 
</script>
</head>
<body style="background-color: #E3E2DE">
    <ul>
        <li><a href="https://windmill-inc.com">Home</a></li>
        <li><a href="/">Dash</a></li>
        <li><a class="active" href="/messenger">Messenger</a></li>
        <li style="float:right"><a href="/messenger/friends.php">Friends</a></li>
    </ul>
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="mt-5 mb-3 clearfix">
                        <h2 class="pull-left">Messages</h2>
                        <a href="" id="link" class="btn btn-success pull-right"><i class="fa fa-plus"></i> New Message</a>
                        <div id="popup">
                        <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <h2 class="mt-5">New Message</h2>
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                        <div class="form-group">
                            <label>To:   </label>
                            <select id="dbox" name="uto" style="height:20px;width:200px">  
                                <option value="">To</option>
                                <?php
                                    $sql = "SELECT id, username, aname FROM users";
                                    $result = mysqli_query($link, $sql);

                                    if (mysqli_num_rows($result) > 0) {
                                        // output data of each row
                                        while($row = mysqli_fetch_assoc($result)) {
                                        echo "<option value='" . $row["username"]. "'>" . $row["aname"]. "</option>";
                                    }
                                    } else {
                                        echo "0 results";
                                    }
                                    ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>From: </label>
                            <select id="dbox2" name="ufrom" style="height:20px;width:200px">  
                                <option value="">From</option>
                                <?php
                                    $sql = "SELECT id, username, aname FROM users";
                                    $result = mysqli_query($link, $sql);

                                    if (mysqli_num_rows($result) > 0) {
                                        // output data of each row
                                        while($row = mysqli_fetch_assoc($result)) {
                                        echo "<option value='" . $row["username"]. "'>" . $row["aname"]. "</option>";
                                    }
                                    } else {
                                        echo "0 results";
                                    }
                                    ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Message</label>
                            <textarea name="message" class="form-control <?php echo (!empty($message_err)) ? 'is-invalid' : ''; ?>"><?php echo $message; ?></textarea>
                            <span class="invalid-feedback"><?php echo $message_err;?></span>
                            <span class="invalid-feedback"><?php echo $uto_err;?></span>
                        </div>
                        <input type="submit" class="btn btn-primary" value="Submit">
                        <a onClick="window.top.location.href = 'index.php'" class="btn btn-secondary ml-2">Cancel</a>
                    </form>
                </div>
            </div>        
        </div>
    </div>
                        </div>
                        <div id="popupdarkbg"></div>    
                    </div>
                    <script type="text/javascript">
                        function closepopup() {
                            document.getElementById("popup").style.display = "none";
                            document.getElementById("popupdarkbg").style.display = "none";
                            e.preventDefault();
                            return;
                        }
                        document.getElementById("link").onclick = function(e) {
                            e.preventDefault();
                            document.getElementById("popupdarkbg").style.display = "block";
                            document.getElementById("popup").style.display = "block";
                            document.getElementById('popupdarkbg').onclick = function() {
                                document.getElementById("popup").style.display = "none";
                                document.getElementById("popupdarkbg").style.display = "none";
                            };
                            return false;
                        }
                        window.onkeydown = function(e) {
                            if (e.keyCode == 27) {
                            closepopup();
                            }
                        }
                    </script>
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
                                            echo '<a href="read.php?id='. $row['id'] .'" class="mr-3" title="View Message" data-toggle="tooltip"><span class="fa fa-eye"></span></a>';
                                            echo '<a href="delete.php?id='. $row['id'] .'" title="Delete Message" data-toggle="tooltip"><span class="fa fa-trash"></span></a>';
                                        echo "</td>";
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
                    mysqli_close($link);
                    ?>
                </div>
            </div>        
        </div>
    </div>
</body>
</html>
<?php }else{ ?>
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
        #popup { display: none; position: fixed; top: 12%; left: 15%; width: 70%; height: 70%; background-color: white; z-index: 10; }
        #popup iframe { width: 100%; height: 100%; border: 0; }
        #popupdarkbg { position: fixed; z-index: 5; left: 0; top: 0; width: 100%; height: 100%; overflow: hidden; background-color: rgba(0,0,0,.75); display: none; }
    </style>
    <script>
        $(document).ready(function(){
            $('[data-toggle="tooltip"]').tooltip();   
        });
    </script>
</head>
<body style="background-color: #E3E2DE">
    <ul>
        <li><a href="windmill-inc.com">Home</a></li>
        <li><a href="/">Dash</a></li>
        <li><a class="active" href="/messenger">Messenger</a></li>
        <li style="float:right"><a href="/messenger/friends.php">Friends</a></li>
    </ul>
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="mt-5 mb-3 clearfix">
                        <h2 class="pull-left">Messages</h2>
                        <a href="" id="link" class="btn btn-success pull-right"><i class="fa fa-plus"></i> New Message</a>
                        <div id="popup"><iframe id="popupiframe" src="create.php"></iframe></div>
                        <div id="popupdarkbg"></div>
                    </div>
                    <script type="text/javascript">
        document.getElementById("link").onclick = function(e) {
  e.preventDefault();
  document.getElementById("popupdarkbg").style.display = "block";
  document.getElementById("popup").style.display = "block";
  document.getElementById('popupiframe').src = "http://windmill-inc.com";
  document.getElementById('popupdarkbg').onclick = function() {
      document.getElementById("popup").style.display = "none";
      document.getElementById("popupdarkbg").style.display = "none";
  };
  return false;
}

window.onkeydown = function(e) {
    if (e.keyCode == 27) {
      document.getElementById("popup").style.display = "none";
      document.getElementById("popupdarkbg").style.display = "none";
      e.preventDefault();
      return;
    }
}
    </script>
                    <?php
                    
                    // Attempt select query execution
                    $sql = "SELECT * FROM messenger WHERE uto='$username' OR uto='everyone' OR ufrom='$username'";
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
                                            echo '<a href="read.php?id='. $row['id'] .'" class="mr-3" title="View Message" data-toggle="tooltip"><span class="fa fa-eye"></span></a>';
                                            echo '<a href="delete.php?id='. $row['id'] .'" title="Delete Message" data-toggle="tooltip"><span class="fa fa-trash"></span></a>';
                                        echo "</td>";
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
                    mysqli_close($link);
                    ?>
                </div>
            </div>        
        </div>
    </div>
</body>
</html>
<?php } ?>