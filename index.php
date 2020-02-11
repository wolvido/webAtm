<?php 
// credits to indian guy from Tutorialswebsite for the sql import code

/**
 * @function    importDatabaseTables
 * @author      Tutorialswebsite
 * @link        http://www.tutorialswebsite.com
 * @usage       Import database tables from a SQL file
 */
 
$dbHost     = 'localhost';
$dbUname = 'root';
$dbPass = '';
$dbName     = 'atm';
$filePath   = 'atm.sql';
 
if(file_exists($filePath)){
importDatabaseTables($dbHost, $dbUname, $dbPass, $dbName, $filePath);
}
 
function importDatabaseTables($dbHost, $dbUname, $dbPass, $dbName, $filePath){
    // Connect & select the database
    $db = new mysqli($dbHost, $dbUname, $dbPass, $dbName); 
 
    // Temporary variable, used to store current query
    $templine = '';
    
    // Read in entire file
    $lines = file($filePath);
    
    $error = '';
    
    // Loop through each line
    foreach ($lines as $line){
        // Skip it if it's a comment
        if(substr($line, 0, 2) == '--' || $line == ''){
            continue;
        }
        
        // Add this line to the current segment
        $templine .= $line;
        
        // If it has a semicolon at the end, it's the end of the query
        if (substr(trim($line), -1, 1) == ';'){
            // Perform the query
            if(!$db->query($templine)){
                $error .= 'Error importing query "<b>' . $templine . '</b>": ' . $db->error . '<br /><br />';
            }
            
            // Reset temp variable to empty
            $templine = '';
        }
    }
    return !empty($error)?$error:true;
}

include('conn.php');

session_start();
?>
<!DOCTYPE html>
<html>		    
	<head>
    
        <meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Bank Atm System</title>
    
		<link rel="stylesheet" href="bootstrap/bootstrap.min.css">
		<link rel="stylesheet" href="bootsrap/this.css"/>

		<script src="bootstrap/jquery.min.js"></script>
		<script src="bootstrap/bootstrap.min.js"></script>
	</head>
	<body>
	
        <nav class="navbar navbar-default navbar-fixed-top" style="background:">
            <div class="container">
				<div class="navbar-header">
                    <a class="navbar-brand" href="index.php"><strong><i class="glyphicon glyphicon-list-alt"></i>  Bank (ATM)</strong></a>
     			</div>
			</div>
		</nav>	
 
        <div class="container-fluid" style="background:#ddd; margin-top:50px;">
            <br/>
            <div class="row">
                <div class="col-md-4 col-md-offset-4">
                    <form method="post" action="">
                        <div class="panel panel-login" style="border-radius:0px; box-shadow:2px 2px 2px 0px;">
                                <div class="panel-heading" id="signin_panel_header">
                                    <p align="center"><img src="user.png"/> </p>
                                    <h4 align="center">User Login</h4>
                                    <hr/>
                                </div>
                                <div class="panel-body" style="margin-top:-25px;">
                                    <div class="form-group">
                                        <label>Username</label>
                                        <input type="text" name="email" class="form-control" placeholder="Username.." required=""/>
                                    </div>
                                    <div class="form-group">
                                        <label>Password</label>
                                        <input type="password" name="pass" class="form-control" placeholder="Password.." required=""/>
                                    </div>
                                </div>
                                <div class="panel-footer footer-login">
                                    <center>
                                        <button type="submit" name="login" class="btn btn-success btn-custom" style="padding:12px 35px;"><i class="glyphicon glyphicon-log-in"></i> Login</button>
                                    </center>
                                </div>
                            </div>         
                        </form>
                    </div>
                </div> 
            </div> 
             <?php
        if(isset($_POST['login'])){
            $user = mysqli_real_escape_string($con, $_POST['email']);
            $pass = mysqli_real_escape_string($con, $_POST['pass']);
            $query ="select * from user where bankcode='$user' and pass='$pass' ";
            $run = mysqli_query($con,$query);
            if(mysqli_num_rows($run)==1)
            {
                $query_id ="select * from user where bankcode='$user'";
                $run_id = mysqli_query($con,$query_id);
                $run_id2 = mysqli_fetch_array($run_id);
                $_SESSION['id'] = $run_id2['id'];
                $_SESSION['name'] = $run_id2['name'];
                echo "<script>window.open('home.php','_self');</script>";
            }
            else
            {
                echo "<script>alert('** Please Enter Correct Information **')</script>";
            }   
        }
    ?>      

<div class="container-fluid" style="background:#555; color:#fff; padding:10px 0px">
                    <h4 align="center">I used Mysql</h4>
                    <h4 align="center">Accounts:</h4>
                    <h4 align="center">User: Denie Pass:12345</h4>
                    <h4 align="center">User: Winzyl Pass:Winzyl</h4>
        </div>
            
            
	</body>
</html>