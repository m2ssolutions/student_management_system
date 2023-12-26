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
    <title>Teacher Dashboard</title>
    <link rel="stylesheet" href="../../css/admin.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <style>
        .wrapper{
            width: 470px;
            background: #fff;
            border-radius: 5px;
            padding: 25px 25px 30px;
        }
        .wrapper h2{
            color:black;
            font-size: 28px;
            text-align: center;
        }
        .wrapper textarea{
            width: 100%;
            height: 59px;
            padding: 15px;
            outline: none;
            resize: none;
            font-size: 16px;
            margin-top: 20px;
            border-radius: 5px;
            border-color: #F0A500;
            max-height: 330px;
            }
        textarea:is(:focus, :valid){
            border-width: 2px;
            padding: 14px;
            border-color: #F0A500;
        }
        textarea::-webkit-scrollbar{
            width: 0px;
        }
        .button{
        position: center;
        width: 100px;
        padding: 10px 10px;
        text-align: center;
        margin: 10px 0px;
        font-weight: bold;
        border: 2px solid #F0A500;
        color: black;
        border-radius: 10px;
        background: #F0A500;
        cursor: pointer;
        overflow: hidden;
        text-align: uppercase;
        }
        .span{
            background: #F0A500;
            height: 100%;
            width: 70px;
            height: 20px;
            position: center;
            left: 0;
            bottom: 0;
            z-index: -1;
            transition: 0.5s;
        }
        button:hover span{
            width: 100%;
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
                <a class="active" href="teacherhome.php" >Dashboard</a>
            </li>
            <li>
                <a href="markattendance.php">Mark <br>Attendance</a>
            </li>
            <li>
                <a href="t_studentdetails.php ">Student Details</a>
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
    <h1>Hello  <?php echo $_SESSION['username'];?>,</h1>
        <h1 id="demo"></h1>

        <script>
            const time = new Date().getHours();
            let greeting;
            if (time < 12) {
                greeting = "Good morning";
            } else if (time < 18) {
                greeting = "Good afternoon";
            }else {
                greeting = "Good evening";
            }
            document.getElementById("demo").innerHTML = greeting;
        </script>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sequi ex odio repellat praesentium maiores autem eos nobis molestiae doloribus minima non quos veniam, doloremque omnis aperiam quas nemo vel quibusdam.</p>
        <div class="wrapper">
            <h1>Special Notices from Administration..</h1>
            <ul>
                <?php
                include("../../script/conn.php");
                $user=$_SESSION['username'];
                $sql7="SELECT * FROM t_notice ";
                $result1 = mysqli_query($conn,$sql7);
                if(!$result1){
                    die("invalid quary".mysqli_error($conn));
                }
                while($row = mysqli_fetch_array($result1)){
                    echo "<li>".$row['notice']."</li>";
                }?>
            </ul>

            <br>
            <br>
            <h2>Send Notices to the Students in your Class..</h2>
            <form action="../../script/smsg.php" method="POST">
                <input type="hidden" name="user" value="<?php echo $_SESSION['username'];?>">
                <textarea type="text" name="stmessage" placeholder="Type the notice here..." required ></textarea>
                <br>
                <input type="Submit" name="sendfromt" class="btn btn-success" value="SEND">
            </form>
            <br>
            <br>
            <table >
            <tr>
                <th>Messages</th>
                
                
            </tr>
            <?php
                include("../../script/conn.php");
                $user=$_SESSION['username'];
                $qry2="SELECT `t_id` FROM `teacher` WHERE tusername='$user'";
                $result2=mysqli_query($conn,$qry2);
                $row=mysqli_fetch_array($result2);

                $sql5="SELECT * FROM s_notice WHERE t_id='$row[0]'";
                $result = mysqli_query($conn,$sql5);
                if(!$result){
                    die("invalid quary".mysqli_error($conn));
                }
                while($row = mysqli_fetch_array($result)){
            ?>
            <tr>
                <td><?php echo $row['notice']?></td>
                <td>
                    <!-- <button type="submit" name="btn" >Send Mail</button> -->
                    <?php
                    echo"
                    <a class='btn btn-danger' href='teacherhome.php?dels_id={$row['no_id']}'>DELETE</a>";
                    ?>
                </td>
                
            </tr>
            <?php }?>
        </table>
        </div>
        <script>
            const textarea = document.querySelector("textarea");
            textarea.addEventListener("keyup", e =>{
                textarea.style.height = "200px";
                let scHeight = e.target.scrollHeight;
                textarea.style.height = '${scHeight}px'
                });
        </script>
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


if($_GET['dels_id']){

    $dels_id=$_GET['dels_id'];
    $qry="DELETE FROM s_notice WHERE no_id='$dels_id'";
    $re=mysqli_query($conn,$qry);
    
    echo "
    <script>alert('delete successfully');
    document.location.href ='teacherhome.php';
    </script>
    ";
}
?>