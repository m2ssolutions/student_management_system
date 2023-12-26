<?php
    session_start();
        if(!isset($_SESSION['username'])){
             header("location:../login.php");
        }
        elseif($_SESSION['usertype']=='admin'){
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
    <title>Student view Attendence</title>
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
                <a  href="studenthome.php" >Dashboard</a>
            </li>
            <li>
                <a href="changePassword.php">Change my <br>Password</a>
            </li>
            <li>
                <a class="active" href=" viewAttendence.php">View my <br>Attendence</a>
            </li>
            <li>
                <a href="viewResults.php">View my <br>Results</a>
            </li>
            
        
        </ul>
    </aside>
    
    <div class="cont">
        <?php
            include("../../script/conn.php");
            $user=$_SESSION['username'];
            $qry1="SELECT  COUNT(date) FROM attendence WHERE st_id IN (SELECT st_id FROM student WHERE username='$user')";
            $re1=mysqli_query($conn,$qry1);
            $row1 = mysqli_fetch_array($re1);
            $qry2="SELECT  COUNT(date) FROM attendence WHERE st_id IN (SELECT st_id FROM student WHERE username='$user') AND attend='present'";
            $re2=mysqli_query($conn,$qry2);
            $row2 = mysqli_fetch_array($re2);
            echo"<h1>Participate ".$row2[0]." days in total ".$row1[0]." days";
        ?>  
        <hr>
        <h1>My Attendence</h1>
        <table class="table">
            <tr>
                <th>Date</th>
                <th>Status</th>
            </tr>
            <?php
                $sql7="SELECT date,attend FROM attendence WHERE st_id IN (SELECT st_id FROM student WHERE username='$user')";
                $result1 = mysqli_query($conn,$sql7);
                if(!$result1){
                    die("invalid quary".mysqli_error($conn));
                }
                while($row = mysqli_fetch_array($result1)){
            ?>
            <tr>
                <td><?php echo $row['date']?></td>
                <td><?php echo $row['attend']?></td> 
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