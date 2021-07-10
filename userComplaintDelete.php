<?php
include 'db.php';
if(!isset($_SESSION)) { 
    session_start();
    }
    $eid = $_GET['v'];
    $date = $_GET['w'];

    $uid = $_SESSION['uid'];
    // echo $uid;exit;

    $qry = "delete from complaints where eid = $eid and date = '$date' and uid = $uid";
    // echo $qry;exit;
    $e = mysqli_query($con, $qry);

    if($e) {
        echo "<script>alert('Deleted successfully')</script>";
            echo "<script> location.href='userView.php?v=$uid'; </script>";
    } else {
        echo "<script>alert('Deletion failed')</script>";
    }
?>