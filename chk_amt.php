<?php 
include('conn.php');
session_start();
if(!$_SESSION['id']){
    echo "<script>window.open('chkamt.php','_self');</script>";
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
								   <h3 align="center">Your Account Balance </h3>
									<?php
									$id=$_SESSION['id'];
									$amt=mysqli_fetch_array(mysqli_query($con,"select * from user where id='$id'"));
									?>
									<hr>
									<h4 align="center">{ PHP <?php echo $amt['amt']; ?> }</h4>
									<hr>
									<p align="center"><a href="home.php" align="center" class="btn btn-primary btn-custom">Back</a></p>
								</div>
							</div>
							
						</div>
							
						<?php
						if(isset($_POST['sub']))
						{
					        $name=$_POST['ch'];
						
							if($name==1)
							{
								echo "<script>window.open('chkamt.php','_self');</script>";

							}
							else
								if($name==2)
							{
								
							}
							else
								if($name==3)
							{
								
							}
						}
						?>
						
						
						
						
						
					</form>	
				</div>
				<div class="col-sm-4">
				</div>
			
			</div>
		</div>
     
        <div class="container-fluid" style="background:#555; color:#fff; padding:10px 0px">
            
        </div>
	</body>
</html>
<?php } ?>