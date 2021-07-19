<?php
include 'db.php';
if(!isset($_SESSION)) { 
    session_start();
    }
    if(!isset($_SESSION['uid'])){
        header('location:index.php');
      }
    // $uid = $_GET['v'];

    $lid =  $_SESSION['uid'];

    // $q = "select eid from employeereg where lid = $lid";
    // $e = mysqli_query($con, $q);
    // $r = mysqli_fetch_assoc($e);
    // $eid = $r['eid'];
    // echo $eid;exit;

	$qry = "select * from complaints, employeereg where complaints.uid = $lid and complaints.eid = employeereg.eid";
    // echo $qry;exit;
    $r = mysqli_query($con,$qry);
    $count = 1;

    $lid =  $_SESSION['uid'];

    $getName = "select * from userreg where lid = $lid";
    $e = mysqli_query($con, $getName);
    $nameval = mysqli_fetch_assoc($e);
    $name = $nameval['name'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <title>e-Complaint</title>
</head>
<body>

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

<?php

if (mysqli_num_rows($r)) {

     ?>
			<div>

				<table class="table table-hover">
                <tr>
                    <th>Sl No</th>
                    <th>Complaint</th>
                    <th>Designation</th>
                    <th>Filed to</th>
                    <th>Date</th>
                    <th>Status</th>
				</tr>
			<div>
				<?php


    // echo "Hai user";
    // echo $_SESSION['uid'];exit;
    // echo $_SESSION['username'];

    
   
        while ($row = mysqli_fetch_assoc($r)) {
            ?>
            
                <tr>
                    <td><?php echo $count?></td>
                    <td><?php echo $row['complaint']?></td>
                    <td><?php echo $row['designation']?></td>
                    <td><?php echo $row['name']?></td>
                    <td><?php echo $row['date']?></td>
                    <!-- <td><a href="userComplaintDelete.php?v=<?php echo $row['eid']?>&w=<?php echo $row['date']?>" class="btn btn-danger">Delete</a></td> -->
                    <?php if($row['status'] == 3) {
                        echo"<td style='color:green;'><b>Action Taken</b></td>";
                    } else {
                        echo"<td style='color:blue;'><i>Complaint recieved</i></td>";
                    } ?>
                </tr>
            
            <!-- <img src="empimage/<?php echo $row['image']?>"style="max-width: 100px;"><br> -->
            <!-- echo "<img src='empimage/$row["image"]' style='max-width: 100px;'>"; -->
<?php
        $count++;}
    
    
    

    // echo $username;

?>
					</table>
<?php } else echo"<center><br><br><br><br><br><br><h2>No Complaints</h2></center>";
    ?>
</body>
</html>

	
	
	

	



