<?php
include("conn.php");
if(isset($_POST['change'])){
    $user=$_POST['user'];
    $currentpw=$_POST['currentpw'];
    $confirmpw=$_POST['confirmpw'];
    
  

    $qry="UPDATE `student` SET `password`='$confirmpw' WHERE `password`='$currentpw' AND `username`='$user'";
    $re=mysqli_query($conn,$qry);
    // header("location:");
    echo "
    <script>alert('Added successfully');
    document.location.href ='../pages/student/changePassword.php';
    </script>
    ";
}
mysqli_close($conn);
?>