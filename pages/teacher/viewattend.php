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
    <title> View Attendencs</title>
    <link rel="stylesheet" href="../../css/admin.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <style>
    .bd{
        display:flex;
        width:100%;
        justify-content:center;
        align-items:center;
        min-height:10vh;
        flex-direction:row;
        gap:40px;
    }
    .inputBox{
        margin: 20px;
        padding:0;
        box-sizing: border-box;
        position:relative;
        width:250px;
    }
    .inputBox select {
        width:100px;
        padding:10px;
        border:1px solid rgba(255,255,255,0,25);
        border-radius:5px;
        outline:none;
        color:#F0A500;
        font-size:1em;
    }
    .inputBox input {
        width:150px;
        padding:10px;
        border:1px solid rgba(255,255,255,0,25);
        border-radius:10px;
        outline:none;
        color: #F0A500;
        font-size: 1em;
        transition:0.5s;
    }
    .inputBox span{
        position:absolute;
        left:0;
        padding:10px;
        pointer-events:none;
        font-size:1em;
        color: rgba(255,255,255,0,25);
        text-transform:uppercase;
    }
    .inputBox input:valid ~ span,
    .inputBox input:focus ~ span
        {
            color:#F0A500;
            transform: translateX(10px) translateY(-15px);
            font-size: 0.65em;
            padding: 0 10px;
            border-left:1px solid #F0A500;
            border-right:1px solid #F0A500;
            letter-spacing:0.2em;
        }
    .inputBox:nth-child(2) input:valid ~ span,
    .inputBox:nth-child(2) input:focus ~ span
    {
        background: #F0A500
        border-radius: 2px;
    }
    .inputBox input:valid ,
    .inputBox input:focus
    {
        border: 1px solid  #F0A500;

    }
</style>
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
                <a  href="t_studentdetails.php">Student Details</a>
            </li>
            <li>
                <a href="marks.php">Add/Remove <br>Marks</a>
            </li>
            <li>
                <a class="active" href="viewattend.php">View <br>Attenedence</a>
            </li>
            <li>
                <a  href="tchangePassword.php">Change my <br>Password</a>
            </li>
        </ul>
    </aside>
    
    <div class="cont">
        <form action="#" method="POST">
            <div class="bd">
                <div class="inputBox">
                    <label for="date">Please Select a date</label>     
                </div>
                <div class="inputBox">
                    <input type="date" name="date" Value="">
                </div>
                <div class="inputBox">
                    <input type="submit" name="search" value="Search">
                </div>
            </div>
            
            
        </form>
        
        <h1>Details of the student's attendence in your class..</h1>
        <table class='table'>
                 
                    <tr>
                    <th>Student ID</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Status</th>
                    </tr>
              
        <?php
                include("../../script/conn.php");
                $user=$_SESSION['username'];
                if(isset($_POST['search'])){
                    $date=$_POST['date'];
                    $sql7="SELECT * FROM student,attendence WHERE t_id IN(SELECT t_id from teacher WHERE tusername='$user') AND student.st_id=attendence.st_id AND date='$date' ";
                    $result1 = mysqli_query($conn,$sql7);
                    if(!$result1){
                        die("invalid quary".mysqli_error($conn));
                    }
                    
                    while($row = mysqli_fetch_array($result1)){
                        echo"<tr>";
                        echo"<td>".$row['st_id']."</td>";
                        echo"<td>".$row['f_name']."</td>";
                        echo"<td>".$row['l_name']."</td>";
                        echo"<td>".$row['attend']."</td>";
                        echo"</tr>";
                    }
                    
                }
                ?>
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