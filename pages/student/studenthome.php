
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
    <style>
        .notice {
            border: 1px solid #ccc;
            background-color: #f0f0f0;
            padding: 10px;
            margin: 10px;
            height: 80%;
            width: 60%;
        }
    </style>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Dashboard</title>
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
                <a class="active" href="studenthome.php" >Dashboard</a>
            </li>
            <li>
                <a href="changePassword.php">Change my <br>Password</a>
            </li>
            <li>
                <a href="viewAttendence.php ">View my <br>Attendence</a>
            </li>
            <li>
                <a href="viewResults.php">View my <br>Results</a>
            </li>
            
        
        </ul>
    </aside> 
    
    <div class="cont">
        <div class="greeting">
        <h1>Student Dashboard</h1>
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
        <p>Hello have a nice day students. Lets go and study</p>
        </div>
        <div class="notice">
            <h2>Your messages</h2>
            <ul>
                <?php
                include("../../script/conn.php");
                $user=$_SESSION['username'];
                $sql7="SELECT * FROM s_notice WHERE t_id IN((SELECT t_id FROM student WHERE username='$user'),'0') ";
                $result1 = mysqli_query($conn,$sql7);
                if(!$result1){
                    die("invalid quary".mysqli_error($conn));
                }
                while($row = mysqli_fetch_array($result1)){
                    echo "<li>".$row['notice']."</li>";
                }?>
            </ul>
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