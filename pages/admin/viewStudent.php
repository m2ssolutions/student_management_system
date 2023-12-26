<?php
    session_start();
        if(!isset($_SESSION['username'])){
             header("location:../login.php");
        }
        elseif($_SESSION['usertype']=='student'){
            header("location:../login.php");
        }
        elseif($_SESSION['usertype']=='teacher'){
            header("location:../login.php");
        }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Students</title>
    <link rel="stylesheet" href="../../css/admin.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    
</head>
<body>
    <header class="header">
    <label class="logo"><img src="../../img/home/logo.png" alt=""></label>
        <div class="logout">
            <a href="../login.php" class="btn btn-outline-danger">Logout</a>
        </div>
    </header>

    <aside class="sinav">
        <ul>
            <li>
                <a href="adminhome.php" >Dashboard</a>
            </li>
            <li>
                <a  href="admission.php">Admissions</a>
            </li>
            <li>
                <a href="newStudent.php">New Student</a>
            </li>
            <li>
                <a class="active" href="viewStudent.php">View Student</a>
            </li>
            <li>
                <a href="teacher.php">Add/View Teacher</a>
            </li>
            
            <li>
                <a href="subject.php">Add/View Subject</a>
            </li>
        </ul>
    </aside>
    
    <div class="cont">
        <h1>Students</h1>
        <form action="#" method="post">
        <table class="table">
            <tr>
                <th>Username</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Birthday</th>
                <th>Address</th>
                <th>Guardian Name</th>
                <th>Email</th>
                <th>Phone Number</th>
                <th>teacher</th>
            </tr>
            <?php
                include("../../script/conn.php");
                
                $sql7="SELECT * FROM student,guardiun,teacher WHERE student.st_id=guardiun.st_id and student.t_id=teacher.t_id ";
                $result1 = mysqli_query($conn,$sql7);
                if(!$result1){
                    die("invalid quary".mysqli_error($conn));
                }
                while($row = mysqli_fetch_array($result1)){
            ?>
            <tr>
                <td><?php echo $row['username']?></td>
                <td><?php echo $row['f_name']?></td>
                <td><?php echo $row['l_name']?></td>
                <td><?php echo $row['dob']?></td>
                <td><?php echo $row['address']?></td>
                <td><?php echo $row['name']?></td>
                <td><?php echo $row['email']?></td>
                <td><?php echo $row['phone']?></td>
                <td><?php echo $row['tname']?></td>
                <!-- <td><button type="submit" name="btn" >Send Mail</button></td> -->
                
            </tr>
            <?php }?>
        </table>
        </form>
        
    </div>
    
    

    <footer>
    
        <h6>Follow us on </h6>
        <ul>
          <li><a href="https://www.facebook.com"><img src="../../img/home/icons8-facebook-48.png" alt=""></a></li>
          <li><a href="https://www.youtube.com"><img src="../../img/home/icons8-youtube-logo-48.png" alt=""></a></li>
        </ul>
        
        <h6>©All Rights Reserved.</h6>
    </footer>
</body>
</html>

