<!DOCTYPE html>
<html lang="en">
<head>
	<title>e-complaint</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
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
<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="index.php">e-Complaint</a>
    </div>
    <ul class="nav navbar-nav">
      <li class="active"><a href="index.php">Home</a></li>
    </ul>
  </div>
</nav>
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100 p-t-50 p-b-90">
			<!-- <a href="index.php">Home</a> -->
				<form class="login100-form validate-form flex-sb flex-w" action="register.php" method="POST">
					<span class="login100-form-title p-b-51">
						Register Now!
					</span>

					
					<div class="wrap-input100 validate-input m-b-16" data-validate = "Name is required">
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
					</div>


                    <div class="wrap-input100 validate-input m-b-16" data-validate = "Username is required">
						<input class="input100" type="text" name="uname" placeholder="Username">
						<span class="focus-input100"></span>
					</div>
					
					
					<div class="wrap-input100 validate-input m-b-16" data-validate = "Password is required">
						<input class="input100" type="password" name="pass" placeholder="Password">
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
                        <input type="submit" class="login100-form-btn" name="register" value="Register">
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
    <form action="register.php" method="POST">
    <center>
        <table>
        <input type="hidden" name="hide">
        <tr><td>name<input type="text" name="name"></td></tr>
        <tr><td>place<input type="text" name="place"></td></tr>
        <tr><td>contact no<input type="text" name="cno"></td></tr>
        <tr><td>set username<input type="text" name="uname"></td></tr>
        <tr><td>set password<input type="password" name="pass"></td></tr>

        </table>
        <input type="submit" name="register" value="Register">
    
    </center>
    </form>
</body>

</html> -->










<?php

    include 'db.php';

    if(isset($_POST['register']))
    {
        $name = $_POST['name'];
        $place = $_POST['place'];
        $cno = $_POST['cno'];
        $uname = $_POST['uname'];
        $pass = $_POST['pass'];

		$pass = md5($pass);

		$q = "INSERT INTO login(username, password, status) values ('$uname','$pass',2)";
		$r = mysqli_query($con, $q);

		$q1 = "SELECT lid from login WHERE username = '$uname' and password = '$pass'";
		$r1 = mysqli_query($con, $q1); 

		$lid = null;
		$row = mysqli_fetch_assoc($r1);
		$lid = $row['lid'];
		//echo $row[lid];exit;
      
        $qry = "INSERT into userreg(name,place,contact,lid) values ('$name','$place',$cno,$lid)";
        //  echo $qry;exit;
        $r = mysqli_query($con,$qry);
        if($r)
        {
            echo "<script>alert('registration successful')</script>"; // used script for pop-up message
            echo "<script> location.href='index.php'; </script>";
        }
        else{
            echo "<script>alert('registration failed')</script>";
            
        }
    }

?>