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
    <title>Subjects</title>
    <link rel="stylesheet" href="../../css/admin.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <style>
        form{
            width: 100%;
            max-width: 600px;
            
        }

        .input-group{
            margin-bottom: 30px;
            position: relative; 
            

        }

        input, textarea,select{
            width: 100%;
            padding: 10px;
            outline: 0;
            border: 3px solid black;
            color: black;
            background: transparent;
            border-radius: 24px;
            font-size: 15px;
        }

        label{
            height: 100%;
            position:absolute; 
            left: 05;
            top: 0;
            padding: 15px;
            color: black;
            cursor:text;
            transition: 0.2s;
        }  

        button{
            padding: 0;
            color: #000000;
            font-weight: bold;
            outline: none;
            background-color: #f0a500;
            border-radius: 35px;
            border: none;
            width: 100%;
            height: 35px;
            cursor: pointer;

        }

        input:focus~label,
        input:valid~label,
        textarea:focus~label,
        textarea:valid~label{
            top: -35px;
            font-size: 14px;
        }

        .row{
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .row .input-group{
            flex-basis: 50%;
        }
    </style>
    <script>
                    // Button DOM 
                    let btn = document.getElementById("btn"); 
  
                    // Adding event listener to button 
                    btn.addEventListener("click", () => { 
    
                        // Fetching Button value 
                        let btnValue = btn.value; 
    
                        // jQuery Ajax Post Request 
                        $.post('action.php', { 
                            btnValue: btnValue 
                        }, (response) => { 
                         // response from PHP back-end 
                        console.log(response); 
                        }); 
                    });
                </script>
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
                <a href="viewStudent.php">View Student</a>
            </li>
            <li>
                <a href="teacher.php">Add/View Teacher</a>
            </li>
            
            <li>
                <a class="active" href="subject.php">Add/View Subject</a>
            </li>
        </ul>
    </aside>
    
    <div class="cont">
        <h1>Add Subject</h1>
        <form action="../../script/addsub.php" method="post">
            <div class="input-group">
                <input type="text" id="subname" name="subname" required>
                <label for="lname"><i class="fa-regular fa-user"></i>  New Subject</label>
            </div>
            <button type="submit" name="add">ADD NEW SUBJECT<i class="fa-regular fa-paper-plane"></i></button>
            <hr>
        </form>
        <h1>Subjects</h1>
        <form action="#" method="post">
        <table class="table">
            <tr>
                <th>Subject ID</th>
                <th>Subject</th>
                
            </tr>
            <?php
                include("../../script/conn.php");
                $sql5="select * from subject";
                $result = mysqli_query($conn,$sql5);
                if(!$result){
                    die("invalid quary".mysqli_error($conn));
                }
                while($row = mysqli_fetch_array($result)){
            ?>
            <tr>
                <td><?php echo $row['sub_id']?></td>
                <td><?php echo $row['sub_name']?></td>
                
                
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

