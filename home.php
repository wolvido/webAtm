<?php 
include('conn.php');
session_start();
if(!$_SESSION['id']){
    echo "<script>window.open('index.php','_self');</script>";
}else{
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
  </body>
    </head>
    
	<body>

		<nav class="navbar navbar-default navbar-fixed-top" style="background:">
			<div class="container">
				<div class="navbar-header">
                  <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>                        
					</button>
					  <a class="navbar-brand" href="home.php"><strong><i class="glyphicon glyphicon-list-alt"></i> ABC Bank (ATM)</strong></a>
     			</div>
                <div class="collapse navbar-collapse" id="myNavbar">
					<ul class="nav navbar-nav navbar-right">
						<li><a href="logout.php"><span class='glyphicon glyphicon-log-out'></span>  Logout</a></li>
                    </ul>
			</div>
		</nav>	
 
        <div class="container-fluid" style="background:#ddd; margin-top:50px;">
            <br/>
            <div class="row">
                <div class="col-md-4 col-md-offset-4">
                    <form method="post" action="">
                        <div class="panel" style="border-radius:0px; box-shadow:2px 2px 4px 0px;">
                            <div class="panel-heading" style="font-size:23px; margin-bottom:-20px; text-align:center;">
                                <i class="glyphicon glyphicon-copy"></i> ATM Machine 
                            </div>
                            <hr/>
                            <div class="panel-body" style="margin:-20px 0px; ">
                                <div class="well well-sm" style="border-radius:0px;">
                                
                                
								    <h4><b>Welcome Mr/s. <?php echo ucwords($_SESSION['name']);?></b></h4>
								    <hr/>
								    <h4>Select your choice </h4>
									<h5>1 : Balance Inquire </h5>
									<h5>2 : Cashout </h5>
									<h5>3 : Check </h5>	
                                    <h5>4 : Deposit </h5>
								</div>
							</div>
							<div class="panel-footer">
                                <select name="option" class="form-control">
                                    <option value="1">Option 1</option>
                                    <option value="2">Option 2</option>
                                    <option value="3">Option 3</option>
                                    <option value="4">Option 4</option>
                                </select>
                                <br/>
                                <center>
                                    <button type="submit" name="sub" class="btn btn-info btn-custom"><span class="glyphicon glyphicon-send"></span> Submit</button>
                                </center>
                            </div>
                        </div>
						<?php
						if(isset($_POST['sub']))
						{
					        $opt=$_POST['option'];
							// save from hacking maybe 
							if($opt==1)
							{
                                echo "<script>window.open('chk_amt.php','_self');</script>";
							}
							else if($opt==2)
							{
                                echo "<script>window.open('chk_cash.php','_self');</script>";
							}
							else if($opt==3)
							{
                                echo "<script>window.open('check.php','_self');</script>";
                            }
                            else if($opt==4)
							{
                                echo "<script>window.open('chk_dep.php','_self');</script>";
                            }
                        }
                        ?>
					</form>	
                </div>
            </div>
        </div>

            <div class="container-fluid" style="background:#555; color:#fff; padding:10px 0px">
                    <h4 align="center">Legit Copyrights &copy; 2020</h4>
                    <h4 align="center">System Developed by Winzyl Waterz</h4>
        </div>
	</body>
</html>
<?php  } ?>