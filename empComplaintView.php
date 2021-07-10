<?php
include 'db.php';
if(!isset($_SESSION)) { 
    session_start();
    }
    // $uid = $_GET['v'];

    $lid =  $_SESSION['uid'];

    $q = "select eid from employeereg where lid = $lid";
    $e = mysqli_query($con, $q);
    $r = mysqli_fetch_assoc($e);
    $eid = $r['eid'];
    // echo $eid;exit;

	$qry = "select * from complaints where eid = $eid and status = 1";
    // echo $qry;exit;
    $r = mysqli_query($con,$qry);
    $count = 1;
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
    <div class="navbar-header">
      <a class="navbar-brand" href="index.php">e-Complaint</a>
    </div>
    <ul class="nav navbar-nav">
      <li class="active"><a href="employeeView.php">Home</a></li>
      <li><a href="empComplaintView.php">View Complaints</a></li>
      <li><a href="logout.php">Logout</a></li>
    </ul>
  </div>
</nav>

			<div>

<?php  if (mysqli_num_rows($r)) { ?>
				<table class="table table-hover">
                <tr>
                    <th>Sl No</th>
                    <th>Complaint</th>
                    <th>Date</th>
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
                    <td><?php echo $row['date']?></td>
                </tr>
            
            <!-- <img src="empimage/<?php echo $row['image']?>"style="max-width: 100px;"><br> -->
            <!-- echo "<img src='empimage/$row["image"]' style='max-width: 100px;'>"; -->
<?php
        $count++;}
    
    }else echo"<center><br><br><br><br><br><br><h2>No Complaints</h2></center>";
    
    

    // echo $username;

?>
					</table>
</body>
</html>

	
	
	

	



