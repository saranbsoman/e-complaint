<?php
include 'db.php';
	if(!isset($_SESSION)) { 
		session_start();
		}
		if(!isset($_SESSION['uid'])){
			header('location:index.php');
		  }

	$lid =  $_SESSION['uid'];

    $getName = "select * from userreg where lid = $lid";
    $e = mysqli_query($con, $getName);
    $nameval = mysqli_fetch_assoc($e);
    $name = $nameval['name'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>e-complaint</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
<!--===============================================================================================-->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
</head>
<body>
<nav class="navbar navbar-inverse">
  <div  class="container-fluid">
    <!-- <div class="navbar-header">
      <a class="navbar-brand" href="index.php">e-Complaint</a>
    </div> -->
    <ul style='display: block;' class="nav navbar-nav">
      <li class="active"><a href="userView.php">Home</a></li>
      <li><a href="userComplaints.php">My Complaints</a></li>
      <li><a href="userChangePassword.php">Change Password</a></li>
      <li><a href="logout.php">Logout</a></li>
    </ul>
	<div class='user-data' style="display: flex;float: right;">
      <h4 style='color: white;padding: 5px;'><?php echo($name) ?></h4>
    </div>
  </div>
</nav>
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100 p-t-50 p-b-90">
			<!-- <a href="index.php">Home</a> -->
				<form class="login100-form validate-form flex-sb flex-w" action="" method="POST">
					<span class="login100-form-title p-b-51">
						Change Password
					</span>

					
					<!-- <div class="wrap-input100 validate-input m-b-16" data-validate = "Name is required">
						<input class="input100" type="text" name="name" placeholder="Name">
						<span class="focus-input100"></span>
					</div>
					
					
					<div class="wrap-input100 validate-input m-b-16" data-validate = "Place is required">
						<input class="input100" type="text" name="place" placeholder="Place">
						<span class="focus-input100"></span>
					</div>


                    <div class="wrap-input100 validate-input m-b-16" data-validate = "Phone number is required">
						<input class="input100" type="text" name="cno" placeholder="Phone number">
						<span class="focus-input100"></span>
					</div> -->

                    <div class="wrap-input100 validate-input m-b-16" data-validate = "Old Password is required">
						<input class="input100" type="password" name="opass" placeholder="Old Password" required>
						<span class="focus-input100"></span>
					</div>


                    <div class="wrap-input100 validate-input m-b-16" data-validate = "Password is required">
						<input class="input100" type="password" name="pass" placeholder="New Password" required>
						<span class="focus-input100"></span>
					</div>
					
					
					<div class="wrap-input100 validate-input m-b-16" data-validate = "Confirmed Password is required">
						<input class="input100" type="password" name="cpass" placeholder="Confirm Password" required>
						<span class="focus-input100"></span>
					</div>
					
					<!-- <div class="flex-sb-m w-full p-t-3 p-b-24">
						<div>
							<a href="register.php" class="txt1">
								New User?
							</a>
						</div>
					</div> -->

					<div class="container-login100-form-btn m-t-17">
						<!-- <button class="login100-form-btn"> -->
                        <input type="submit" class="login100-form-btn" name="register" value="Change Password">
							<!-- Login -->
						<!-- </button> -->
					</div>

				</form>
			</div>
		</div>
	</div>
	

	<div id="dropDownSelect1"></div>
	
<!--===============================================================================================-->
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/daterangepicker/moment.min.js"></script>
	<script src="vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
	<script src="js/main.js"></script>

</body>
</html>



<?php
include 'db.php';

if(isset($_POST['register']))
{
    if (isset($_POST['cpass']) and ($_POST['cpass']) != null) 
	{
		if (isset($_POST['pass']) and ($_POST['pass']) != null)
		{
            if (isset($_POST['opass']) and ($_POST['opass']) != null)
		    {
                $opass = $_POST['opass'];
                $cpass = $_POST['cpass'];
                $pass = $_POST['pass'];

                $lid = $_SESSION['uid'];

                $qq = "select * from login WHERE lid = $lid";
                // echo $qq;exit;
                $ee = mysqli_query($con, $qq);

                $opass = md5($opass);
                      
                    while($row = mysqli_fetch_assoc($ee)) {
                        if($opass == $row['password']){
                            if($cpass == $pass){
                                $pass = md5($pass);
                                
                                $qry = "update login set password = '$pass' where lid = $lid";
                                // echo $qry;exit;
                                $e = mysqli_query($con, $qry);
                            } else {
                                echo "<script>alert('Password doesnot match')</script>";
                            }
            
                            if($e) {
                                echo "<script>alert('Password Changed')</script>";
                            } else {
                                echo "<script>alert(' failed')</script>";
                            }
                        } else echo "<script>alert('Old password doesnot match')</script>";
                    }
                

                // echo $cid;exit;
                
            }else echo "<script>alert('Old password mandatory field')</script>";    
        }else echo "<script>alert('Password mandatory field')</script>";
    }else echo "<script>alert('Confirm password mandatory field')</script>"; 
}   
?>