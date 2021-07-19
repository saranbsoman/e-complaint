<?php
include 'db.php';
if(!isset($_SESSION)) { 
    session_start();
    }
    // else echo "<script> location.href='index.php'; </script>";
    if(!isset($_SESSION['uid'])){
      header('location:index.php');
    }
    // $uid = $_GET['v'];

    $lid =  $_SESSION['uid'];

    $q = "select * from employeereg where lid = $lid";
    $e = mysqli_query($con, $q);
    $r1 = mysqli_fetch_assoc($e);
    $eid = $r1['eid'];
    $name = $r1['name'];
    $image = $r1['image'];
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
    <link rel="stylesheet" href="./css/main.css">
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
      <li class="active"><a href="employeeView.php">Home</a></li>
      <li><a href="empComplaintView.php">View Complaints</a></li>
      <li><a href="empChangePassword.php">Change Password</a></li>
      <li><a href="logout.php">Logout</a></li>
    </ul>
    <div class='user-data' style="display: flex;float: right;">
      <h4 style='color: white;padding: 5px;'><?php echo($name) ?></h4>
      <img style="height: 45px;width:45px;border-radius: 50px;margin-left:10px;" src='empimage/<?php echo $image?>'>
    </div>
  </div>
</nav>

			

			
			
<?php
    if (mysqli_num_rows($r)) {?>
            <table class="table table-hover">
                <tr>
                    <th>Sl No</th>
                    <th>Complaint</th>
                    <th>Date</th>
				</tr>
        <?php while ($row = mysqli_fetch_assoc($r)) {
            // echo "haaiii";exit;
            // echo $row['status'];exit;
?>
            
                <tr>
                <?php  if($row['status'] == 1) {?>
                    <td><?php echo $count?></td>
                    <td><?php echo $row['complaint']?></td>
                    <td><?php echo $row['date']?></td>
                    
                        <td><a href="empComplaintCheck.php?v=<?php echo $row['cid']?>" class="btn btn-warning btn-xs">Unchecked</a></td>
                    <?php } ?>
                    
                </tr>
            
<?php 
        $count++;}
    
    }else echo"<center><br><br><br><br><br><br><h2>No new Complaints</h2></center>";

        
?>
			</table>
</body>
</html>