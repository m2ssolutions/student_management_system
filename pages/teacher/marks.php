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
<?php
    include("../../script/conn.php");
    $user=$_SESSION['username'];
    $query = "SELECT * FROM student WHERE t_id IN(SELECT t_id from teacher WHERE tusername='$user') ";
    $result1 = mysqli_query($conn, $query);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>marks</title>
    <link rel="stylesheet" href="../../css/admin.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

    <style>
    .bd{
        display:flex;
        justify-content:top;
        align-items:center;
        min-height:100vh;
        flex-direction:column;
        gap:10px;
    }
    .inputBox{
        margin: 20px;
        padding:0;
        box-sizing: border-box;
        position:relative;
        width:200px;
    }
    .inputBox select {
        width:150px;
        padding:10px;
        border:1px solid rgba(255,255,255,0,25);
        border-radius:5px;
        outline:none;
        color:#F0A500;
        font-size:1em;
    }
    .inputBox input {
        width:200px;
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
                <a  href="markattendance.php">Mark <br>Attendance</a>
            </li>
            <li>
                <a href="t_studentdetails.php">Student Details</a>
            </li>
            <li>
                <a class="active" href="marks.php">Add/Remove <br>Marks</a>
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
    <h2> Add Marks to your students..</h2>
        <br>
        <br>
        <br>
        <form action="../../script/addmarks.php" method="post">
            <div class="bd">
            <table>
                <tr>
                    <td>
                        <div class="inputBox">
                            <select name="st_id" id="st_id" >
                                <option value="null" selected>not selected</option>
                                <?php while($row1 = mysqli_fetch_array($result1)):;?>
                                <option value="<?php echo $row1[0];?>"><?php echo $row1[3];?></option>
                                <?php endwhile;
                                mysqli_close($conn);
                                ?>
                            </select>
                        </div>
                    </td>
                    <td>
                        <div class="inputBox">
                            <input type="text" name="year" required="required">
                            <span>Year</span>
                        </div>
                    </td>
                    <td>
                        <div class="inputBox">
                            <input type="text" name="grade" required="required">
                            <span>Grade</span>
                        </div>
                    </td>
                    <td>
                        <div class="inputBox">
                            <select name="term">
                                <option value="1">1st term</option>
                                <option value="2">2nd term</option>
                                <option value="3">3rd term</option>
                            </select>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>
                        <div class="inputBox">
                                <input type="text" name="maths" required="required">
                                <span>Mathematics</span>
                        </div>
                        <div class="inputBox">
                                <input type="text" name="sci" required="required">
                                <span>Science</span>
                        </div>
                        <div class="inputBox">
                                <input type="text" name="eng" required="required">
                                <span>English</span>
                        </div>
                        <div class="inputBox">
                                <input type="text" name="sinh" required="required">
                                <span>Sinhala</span>        
                        </div>
                        <div class="inputBox">
                                <input type="text" name="hist" required="required">
                                <span>History</span>
                        </div>
                        <div class="inputBox">
                                <input type="text" name="budd" required="required">
                                <span>Buddhism</span>
                        </div>
                    </td> 
                    <td>
                        <fieldset>
                            <legend>1<sup>st</sup> bucket subject</legend>
                            <div class="inputBox">
                                <input type="text" name="bs" >
                                <span>Business Studies</span>
                            </div>
                            <div class="inputBox">
                                <input type="text" name="geo" >
                                <span>geography</span>
                            </div>
                            <div class="inputBox">
                                <input type="text" name="civic">
                                <span>Civic & Social Science</span>
                            </div>
                        </fieldset>
                    </td>
                    <td>
                        <fieldset>
                            <legend>2<sup>nd</sup> bucket subject</legend>
                            <div class="inputBox">
                                <input type="text" name="music">
                                <span>Music</span>
                            </div>
                            <div class="inputBox">
                                <input type="text" name="art">
                                <span>Art</span>
                            </div>
                            <div class="inputBox">
                                <input type="text" name="dance">
                                <span>Dancing</span>
                            </div>
                        </fieldset>
                    </td>
                    <td>
                        <fieldset>
                            <legend>3<sup>rd</sup> bucket subject</legend>
                            <div class="inputBox">
                                <input type="text" name="it">
                                <span>IT</span>
                            </div>
                            <div class="inputBox">
                                <input type="text" name="media">
                                <span>Media</span>
                            </div>
                            <div class="inputBox">
                                <input type="text" name="agri">
                                <span>Agriculture</span>
                            </div>
                        </fieldset>
                    </td>
                </tr>
                <tr>
                    <td>
                        <div class="inputBox">
                            <input type="submit" value="ADD MARKS" name="submit"/>
                        </div>
                    </td>
                    <td>
                        <div class="inputBox">
	                        <input type="reset" value="Reset" name="reset"/>
                        </div>
                    </td>
                </tr>
            </table>
            </div>
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