<?php
include("conn.php");
if(isset($_POST['ssend'])){
    $msg=$_POST['smessage'];
    $qry="INSERT INTO s_notice(t_id,notice) VALUES ('0','$msg')";
    $result=mysqli_query($conn,$qry);
    header("location:../pages/admin/adminhome.php");
}
if(isset($_POST['sendfromt'])){
    $user=$_POST['user'];
    $qry2="SELECT `t_id` FROM `teacher` WHERE tusername='$user'";
    $result2=mysqli_query($conn,$qry2);
    $row=mysqli_fetch_array($result2);

    $msg=$_POST['stmessage'];
    $qry3="INSERT INTO s_notice(t_id,notice) VALUES ('$row[0]','$msg')";
    $result3=mysqli_query($conn,$qry3);
    header("location:../pages/teacher/teacherhome.php");
}
?>