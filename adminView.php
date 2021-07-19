<?php
include 'db.php';
if(!isset($_SESSION)) { 
    session_start();
}
if(!isset($_SESSION['uid'])){
  header('location:index.php');
}   
	$qry = "select * from employeereg";
    $r = mysqli_query($con,$qry);
    $count = 1;
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>e-Complaint</title>
</head>
<body>


<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <ul class="nav navbar-nav">
      <li class="active"><a href="adminView.php">Home</a></li>
      <li><a href="employeeRegister.php">Add Employee</a></li>
      <li><a href="adminComplaintView.php">View Complaints</a></li>
      <li><a href="logout.php">Logout</a></li>
    </ul>
  </div>
</nav>
<div>

				<table class="table table-hover">
                <tr>
                    <th>Sl No</th>
                    <th>Employee Name</th>
                    <th>Designation</th>
				</tr>
			<div>

				<?php


    // echo "Hai user";
    // echo $_SESSION['uid'];exit;
    // echo $_SESSION['username'];

    
    if (mysqli_num_rows($r)) {
        while ($row = mysqli_fetch_assoc($r)) {
            ?>
            
                <tr>
                    <td><?php echo $count?></td>
                    <td><?php echo $row['name']?></td>
                    <td><?php echo $row['designation']?></td>
                    <td><img src="empimage/<?php echo $row['image']?>"style="max-width: 50px;"></td>
                    <td><a href="adminComplaintViewEmp.php?v=<?php echo $row['eid']?>" class="btn btn-primary">View Complaints</a></td>
                </tr>
            
            <!-- <img src="empimage/<?php echo $row['image']?>"style="max-width: 100px;"><br> -->
            <!-- echo "<img src='empimage/$row["image"]' style='max-width: 100px;'>"; -->
<?php
        $count++;}
    
  }

    

    // echo $username;

?>
	</table>
</body>
</html>
			
	




