<?php
    session_start();
        if(!isset($_SESSION['username'])){
             header("location:../login.php");
        }
        elseif($_SESSION['usertype']=='student'){
            header("location:../login.php");
        }
        elseif($_SESSION['usertype']=='admin'){
            header("location:../login.php");
        }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>student details</title>
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
                <a  href="teacherhome.php" >Dashboard</a>
            </li>
            <li>
                <a href="markattendance.php">Mark <br>Attendance</a>
            </li>
            <li>
                <a class="active" href="t_studentdetails.php">Student Details</a>
            </li>
            <li>
                <a href="marks.php">Add/Remove <br>Marks</a>
            </li>
            <li>
                <a  href="viewattend.php">View <br>Attenedence</a>
            </li>
            <li>
                <a  href="tchangePassword.php">Change my <br>Password</a>
            </li>
        </ul>
    </aside>
    
    <div class="cont">
        <h1>Details of the students in your class..</h1>
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
                </tr>
              
                <?php
                include("../../script/conn.php");
                $user=$_SESSION['username'];
                $sql7="SELECT * FROM student,guardiun WHERE t_id IN(SELECT t_id from teacher WHERE tusername='$user') AND student.st_id=guardiun.st_id ";
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
                    
                </tr>
                <?php }?>
               

            </table>
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