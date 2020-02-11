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
        <!--
          for mobile device maybe
        -->
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
     
       <div class="container-fluid" style="background:#eee; margin-top: 50px; border-radius: 0px;">
            <div class="row">
                <br/>
                <div class="col-sm-12" style="text-align:center;">
                    <div class="panel">
                        <div class="panel-body"  style="border-radius:0px; box-shadow:2px 2px 2px 0px; padding-bottom:0px;">
                            <table align="center" class="table table-bordered table-hover table-striped">
                        <tr>
                            <?php
							 include("conn.php");
							$id=$_SESSION['id'];
							$cn=mysqli_query($con,"select * from user where id='$id'");
							$n = mysqli_fetch_array($cn);
							
							?>
							   <td colspan="3" align="left"  style="background:#444; color:#fff; font-size:20px;">Mr.<?php echo ucwords($n[1]); ?> ( Money Transfer/Cashout Details of <?php echo date('M/Y'); ?> )</td>
							</tr>
							<tr>
								<td align="center"><b>Transection No.</b></td>
								<td align="center"><b>Transection Date</b></td>
								<td align="center"><b>Transection Amount</b></td>
							</tr>
							<?php
							include("conn.php");
							$d = date('M/y'); 
							$user=mysqli_query($con,"select * from tran where uid='$id' and month='$d'");
							$i=0;
							$t=0;
							while($u = mysqli_fetch_array($user)){
							
							$i++;
							
							$t=$t+$u[3];
							
							?>
							<tr>	
								<td ><?php echo $i ?></td>
								<td colspan="" align="center"><?php echo $u[2];?></td>
								<td colspan="" align="center"><?php echo $u[3];?></td>
							</tr>
							<?php  }?>
							<tr>	
								<td colspan="" class="bg-danger" ><h5 align="center">Given Blance: <?php echo $n['g_amt']; ?> </h5></td>
								<td colspan="" class="bg-success" ><h5 align="center">Remaing Amount: <?php echo $n['amt'];?></h5></td>
								<td colspan="" class="bg-info" ><h5 align="center">Total widthdraw Amount: <?php echo $t?></h5></td>
							</tr>
                                <tr>
                                    <td colspan="9">
                                        <a href="home.php" class="btn btn-info btn-custom">Back</a>
                                    </td>
                                </tr>
                        </table>
                        
                        </div>
                    </div>    
                    
                
                </div>
            </div>	
		</div>
        
        <div class="container-fluid" style="background:#555; color:#fff; padding:10px 0px">
            <h4 align="center">maybe Legit Copyrights &copy; 2020</h4>
            <h4 align="center">System Developed by Zyn C. Wilzyn</h4>
        </div>
	</body>
</html>
<?php } ?>