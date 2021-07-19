<?php
	if(!isset($_SESSION)) { 
		session_start();
		}
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<title>e-Complaint</title>
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
</head>
<body>
	
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100 p-t-50 p-b-90">
				<form action="" method="POST" class="login100-form validate-form flex-sb flex-w">
					<span class="login100-form-title p-b-51">
						Login
					</span>

					
					<div class="wrap-input100 validate-input m-b-16" data-validate = "Username is required">
						<input class="input100" type="text" name="uname" placeholder="Username">
						<span class="focus-input100"></span>
					</div>
					
					
					<div class="wrap-input100 validate-input m-b-16" data-validate = "Password is required">
						<input class="input100" type="password" name="pass" placeholder="Password">
						<span class="focus-input100"></span>
					</div>
					
					<div class="flex-sb-m w-full p-t-3 p-b-24">
						<!-- <div class="contact100-form-checkbox">
							<input class="input-checkbox100" id="ckb1" type="checkbox" name="remember-me">
							<label class="label-checkbox100" for="ckb1">
								Remember me
							</label>
						</div> -->

						<div>
							<a href="register.php" class="txt1">
								New User?
							</a>
						</div>
					</div>

					<div class="container-login100-form-btn m-t-17">
						<!-- <button class="login100-form-btn"> -->
                        <input type="submit" class="login100-form-btn" name="login" value="Login">
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













<!-- <html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
    
    <form action="index.php" method="POST">
    <center>
    <table>

        <tr>
            <td>Username<input type="text" name="uname" ></td>
        </tr>
        <tr>
            <td>Password<input type="password" name="pass"></td>
        </tr>
        
    
    </center>
    </table>
    <input type="submit" name="login" value="Login">
    <center><a href="register.php">new user</a></center>
    </form>   
    
</body>
</html> -->



<?php



if(isset($_POST['login']))
{

    $user = $_POST['uname'];
    $pass = $_POST['pass'];

	$pass = md5($pass);

    include 'db.php';

    $qry = "select * from login where username='$user' and password = '$pass'";
    //echo "hello";exit;
    // echo $qry;exit;
    $r = mysqli_query($con,$qry);
    $f = mysqli_num_rows($r);

    $row = mysqli_fetch_assoc($r);

    // echo $row['id'];exit;
    $status = $row['status'];
    $uid = $row['lid'];

	// echo $row['username'];exit;

	//session variable
	$_SESSION['uid'] = $uid;
	$_SESSION['username'] = $row['username'];

	// echo "username : ".$_SESSION['username'];exit;


    //echo $status;exit;

    if($f)
    {
		if($status == '0') {
			echo "<script> location.href='adminView.php?v=$uid'; </script>";
		} elseif($status == '1') {
			echo "<script> location.href='employeeView.php?v=$uid'; </script>";
		} elseif($status == '2') {
			echo "<script> location.href='userView.php?v=$uid'; </script>";
		}
        // echo "hello";exit;
        // header("location:welcome.php");
        // header("Location: welcome.php?v=$uid");
		// echo "<script> location.href='welcome.php?v=$uid'; </script>";
    }
    else
    {
        // echo"wrong passsword";
        
        echo"<script>alert('Wrong credentials')</script>"; // used script for pop-up message
     /*  header('location:index.php'); */
    }
}

// reloading the page keep says wrong credentials because of the lack of session

?>
