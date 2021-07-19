<?php
include 'db.php';
session_start();
if(!isset($_SESSION['uid'])){
  header('location:index.php');
}
$uid = $_SESSION['uid'];
// echo $uid;exit;

?>


<html lang="en">
<head>
    <meta charset="UTF-8">
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
      <li><a href="changePassword.php">Change Password</a></li>
      <li><a href="logout.php">Logout</a></li>
    </ul>
  </div>
</nav>
    <?php
    $lid = $_GET['v'];
    // echo"hello";
    // echo $id;exit;

        $qry = "select * from employeereg where lid='$lid'";
        // echo $qry;exit;
        $r = mysqli_query($con,$qry);
        $row = mysqli_fetch_assoc($r);
        $eid = $row['eid'];
    ?>

    <center>
    
     
    <div>
        <form action="" method="POST">
            <table>

                    <tr><td><Textarea style='width: 700px;height: 150px' placeholder="Make your complaint here..." name="complaint"></Textarea></td></tr><br><br>

            </table>
        
        <br><br><button  class="btn btn-danger" name="save">Register Complaint</button>

        </form>
    </div>
    
    </center>
</body>
</html>

<?php



   

   if(isset($_POST['save']))
   {
    if(isset($_POST["complaint"])AND($_POST["complaint"])!=null)
       {
       $complaint = $_POST['complaint'];
    //    date_default_timezone_set('Asia/Kolkata');

       $d = date("Y-m-d");
       $t = date("h:i:sa");
    //    echo $t;exit;
    //    echo $d;exit;

       $qry = "insert into complaints(complaint, date, time, uid, eid, status) values ('$complaint', '$d', '$t', $uid, $eid, 0)";
    //    echo $qry;exit;
       $q = mysqli_query($con,$qry);
       if($q) {
        //    $qry = "update table complaints set status = 1";
        //    $e = mysqli_query($con, $qry);
            echo "<script>alert('Complaint registered successfully')</script>";
            echo "<script> location.href='userView.php?v=$uid'; </script>";
       }
       }
   }

?>