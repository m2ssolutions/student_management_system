<?php
    include("conn.php");
    if(isset($_POST['add'])){
        $tname = $_POST['tname'];
        $temail = $_POST['temail'];
        $tnumber = $_POST['tnumber'];
        $tsub = $_POST['tsub'];
        $tusername = $_POST['tusername'];
        $password = $_POST['password'];
        $cpassword = $_POST['cpassword'];



        $sql4= "INSERT INTO `teacher`(`tname`,`temail`,`tphone`,`sub_id`,`tusername`,`tpassword`,`usertype`) VALUES ('$tname','$temail','$tnumber','$tsub','$tusername','$cpassword','teacher') ";
        $data = mysqli_query($conn,$sql4);
        echo "
    <script>alert('Added successfully');
    document.location.href ='../pages/admin/teacher.php';
    </script>
    ";
        // header("location:");
    }
    mysqli_close($conn);
?>