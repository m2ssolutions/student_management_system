<?php
    include("conn.php");
    if(isset($_POST['add'])){
        $subname = $_POST['subname'];
        

        $sql4= "INSERT INTO `subject`(`sub_name`) VALUES ('$subname')";
        $data = mysqli_query($conn,$sql4);
        echo "
    <script>alert('Added successfully');
    document.location.href ='../pages/admin/subject.php';
    </script>
    ";
        // header("location:");
    }
    mysqli_close($conn);
?>