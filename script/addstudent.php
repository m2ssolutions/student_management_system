<?php
    include("conn.php");
    if(isset($_POST['add'])){
        $fname = $_POST['fname'];
        $lname = $_POST['lname'];
        $birthday = $_POST['birthday'];
        $address = $_POST['address'];
        $gname = $_POST['gname'];
        $email = $_POST['email'];
        $number = $_POST['number'];
        $tname = $_POST['tname'];
        $username = $_POST['username'];
        $password = $_POST['password'];
        $cpassword = $_POST['cpassword'];

        $sql4= "INSERT INTO `student`(`f_name`,`l_name`,`username`,`password`,`dob`,`address`,`usertype`,`t_id`) VALUES ('$fname','$lname','$username','$cpassword','$birthday','$address','student','$tname') ";
        $data = mysqli_query($conn,$sql4);
        if($data==1){
            $sql5= "SELECT * FROM student WHERE username='$username'";
            $result2 = mysqli_query($conn, $sql5);
            $row2=mysqli_fetch_array($result2);
            $sql6="INSERT INTO `guardiun`(`st_id`,`name`,`email`,`phone`) VALUES ('$row2[0]','$gname','$email','$number')";
            $result3=mysqli_query($conn,$sql6);
        }
        echo "
    <script>alert('Added successfully');
    document.location.href ='../pages/admin/newStudent.php';
    </script>
    ";
        // header("location:");
    }
    mysqli_close($conn);
?>