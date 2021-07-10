<?php
include 'db.php';
if(!isset($_SESSION)) { 
    session_start();
    }
    $cid = $_GET['v'];

    // echo $cid;exit;

    $qry = "update complaints set status = 1 where cid = $cid";
    // echo $qry;exit;
    $e = mysqli_query($con, $qry);

    if($e) {
        echo "<script>alert('Send successfully')</script>";
            echo "<script> location.href='adminView.php'; </script>";
    } else {
        echo "<script>alert(' failed')</script>";
    }
?>