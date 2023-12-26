<?php
error_reporting(0);
session_start();

$server="localhost";
$user ="root";
$password="";
$db ="studentmanage";

$conn = mysqli_connect($server,$user,$password,$db);

if(!$conn){
    die("connection error");
}

    $name = $_POST['username'];
    $password = $_POST['password'];
    $sql1= " select * from admin where username='".$name."' and password='".$password."'  ";
    $sql2=" select * from student where username='".$name."' and password='".$password."'  ";
    $sql3=" select * from teacher where tusername='".$name."' and tpassword='".$password."'  ";
    $result1 = mysqli_query($conn,$sql1);
    $result2 = mysqli_query($conn,$sql2);
    $result3 = mysqli_query($conn,$sql3);
    $row1 = mysqli_fetch_array($result1);
    $row2 = mysqli_fetch_array($result2);
    $row3 = mysqli_fetch_array($result3);

if($row1['usertype']=='admin'){
    
    $_SESSION['username']=$name;
    $_SESSION['usertype']="admin";
    header("location:../pages/admin/adminhome.php");
}   
elseif($row2['usertype']=='student'){
    
    $_SESSION['username']=$name;
    $_SESSION['usertype']="student";
    header("location:../pages/student/studenthome.php");
}
elseif($row3['usertype']=='teacher'){
    
    $_SESSION['username']=$name;
    $_SESSION['usertype']="teacher";
    header("location:../pages/teacher/teacherhome.php");
}
else{
    
    $massage="------username or password invalid------";
    $_SESSION['loginMessage']=$massage;
    header("location:../pages/login.php");
}


?>