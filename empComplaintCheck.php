<?php
include 'db.php';
if(!isset($_SESSION)) { 
    session_start();
    }
    if(!isset($_SESSION['uid'])){
        header('location:index.php');
      }
    $cid = $_GET['v'];

    // echo $cid;exit;

    $qry = "update complaints set status = 3 where cid = $cid";
    // echo $qry;exit;
    $e = mysqli_query($con, $qry);

    if($e) {
        // echo "<script>alert('Send successfully')</script>";
            echo "<script> location.href='employeeView.php'; </script>";
    } else {
        echo "<script>alert(' failed')</script>";
    }
?>