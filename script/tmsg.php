<?php
include("conn.php");
if(isset($_POST['send']))
    $msg=$_POST['message'];
    $qry="INSERT INTO t_notice(notice) VALUES ('$msg')";
    $result=mysqli_query($conn,$qry);
    header("location:../pages/admin/adminhome.php");
?>