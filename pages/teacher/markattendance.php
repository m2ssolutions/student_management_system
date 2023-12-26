<?php
error_reporting(0);
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
    <title>mark attendance</title>
    <link rel="stylesheet" href="../../css/admin.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

<style>


    .filter{

        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        z-index: 1;
      
             
    }
    .table{
        position:absolute;
        z-index:2;
        left:58%;
        top:50%;
        transform: translate(-50%,-50%);
        width: auto;
        border-collapse: collapse;
        border-spacing: 0px;
        border-radius: 12px 12px 0 0;
        overflow: hidden;
        box-shadow: 0 5px 20px rgba(32,32,32,.3);
        text-align: center;
    }
    .table th,td{
        width: auto;
        padding: 12px 62px;
    }
    .table th{
        width: auto;
        background:#F0A500;
        color:black;
        text-transform: uppercase;
    }
    .table tr:nth-child(odd){
        background-color: #eeeeee;
    }

    .button{
        position: left;
        color: black;
        padding: 3px 2px;
        border-radius: 6px;
        background: #F0A500;
        cursor: pointer;
        transition: all 0.2s ease;
    }
    button:active{
        transform: scale(0.96);
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
                <a class="active" href="markattendance.php">Mark <br>Attendance</a>
            </li>
            <li>
                <a href="t_studentdetails.php" >Student Details</a>
            </li>
            <li>
                <a href="marks.php">Add/Remove <br>Marks</a>
            </li>
            <li>
                <a  href="viewattend.php">View <br>Attenedence</a>
            </li>
            <li>
                <a href="tchangePassword.php">Change my <br>Password</a>
            </li>
        </ul>
    </aside>
    
    <div class="cont">
        
            
            <h1>
            <?php
                $currentDate = date('Y/m/d'); 
                echo"Today is ".$currentDate." ".date("l");
            ?>
            </h1>
           
            <br>
            
    <div class="filter">

        <div class="table">
            <table >
             
                <tr>
                <th>ID</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Status</th>
                <th>Attendance</th>
                </tr>
              
                <?php
                include("../../script/conn.php");
                $user=$_SESSION['username'];
                $sql7="SELECT * FROM student WHERE t_id IN(SELECT t_id from teacher WHERE tusername='$user') ";
                $result1 = mysqli_query($conn,$sql7);
                if(!$result1){
                    die("invalid quary".mysqli_error($conn));
                }
                while($row = mysqli_fetch_array($result1)){
                ?>
                <tr>
                    <td><?php echo $row['st_id']?></td>
                    <td><?php echo $row['f_name']?></td>
                    <td><?php echo $row['l_name']?></td>
                    <td></td>
                    <td>
                        <?php
                        echo "
                        <a class='btn btn-success' href='markattendance.php?pst_id={$row['st_id']}'>present</a><br>
                        <a class='btn btn-danger' href='markattendance.php?ast_id={$row['st_id']}'>absent</a>
                        ";
                        ?>
                    </td>
                </tr>
                <?php }?>
               

            </table>
         
            <!-- <div class="button">
            <button type="submit" Value="SUBMIT" name="submit">SUBMIT</button>
            <button type="reset" value="CLEAR" name="reset">CLEAR</button>
            </div> -->
            </div>
           </div>
         
        
        
  
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

<?php
if($_GET['pst_id']){
    $st_id = $_GET['pst_id'];
    $qry="INSERT INTO attendence values('$st_id','$currentDate','present')";
    $result1=mysqli_query($conn,$qry);
    header("location:markattendance.php");
}
if($_GET['ast_id']){
    $st_id = $_GET['ast_id'];
    $qry="INSERT INTO attendence values('$st_id','$currentDate','absent')";
    $result1=mysqli_query($conn,$qry);
    header("location:markattendance.php");
}
?>