<?php
include 'db.php';
if(!isset($_SESSION)) { 
    session_start();
}
if(!isset($_SESSION['uid'])){
  header('location:index.php');
}
    // $uid = $_GET['v'];

	$qry = "select * from employeereg";
    // echo $qry;exit;
    $r = mysqli_query($con,$qry);
    $count = 1;

    $lid =  $_SESSION['uid'];

    $getName = "select * from userreg where lid = $lid";
    $e = mysqli_query($con, $getName);
    $nameval = mysqli_fetch_assoc($e);
    $name = $nameval['name'];
?>
<head>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
</head>

<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <!-- <div class="navbar-header">
      <a class="navbar-brand" href="index.php">e-Complaint</a>
    </div> -->
    <ul class="nav navbar-nav">
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



			<div>    
				<table class="table table-hover">
                <tr>
                    <th>Sl No</th>
                    <th>Employee Name</th>
                    <th>Designation</th>
                    <th>Photo</th>
				</tr>
			<div>


<?php
   
    if (mysqli_num_rows($r)) {
        while ($row = mysqli_fetch_assoc($r)) {
 ?>
            
                <tr>
                    <td><?php echo $count?></td>
                    <td><?php echo $row['name']?></td>
                    <td><?php echo $row['designation']?></td>
                    <td><img  src="empimage/<?php echo $row['image']?>"style="max-width: 50px;max-height: 50px;border-radius: 50px;"></td>
                    <td><a href="makecomplaint.php?v=<?php echo $row['lid']?>" class="btn btn-primary btn-xs">Make Complaint</a></td>
                </tr>
            
            <!-- <img src="empimage/<?php echo $row['image']?>"style="max-width: 100px;"><br> -->
            <!-- echo "<img src='empimage/$row["image"]' style='max-width: 100px;'>"; -->
<?php
        $count++;}
    
    }
  

    // echo $username;

?>
					</table>
				</div>
				
			</div>
		</div>
	</div>
	



</body>
</html>
 



