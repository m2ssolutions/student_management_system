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
    <title>Student Results</title>
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
                <a href="viewAttendence.php ">View my <br>Attendence</a>
            </li>
            <li>
                <a class="active" href="viewResults.php">View my <br>Results</a>
            </li>
            
        
        </ul>
    </aside>
    
    <div class="cont" >
        <h1>My Results</h1>
        
            
            <?php
            include("../../script/conn.php");
            $user=$_SESSION['username'];
                $sql7="SELECT st_id,year,grade,term,maths,sci,eng,sinh,hist, budd,bs,geo,civic,music,art,dance,it,media,agri,(maths+sci+eng+sinh+hist+budd+bs+geo+civic+music+art+dance+it+media+agri) AS total,((maths+sci+eng+sinh+hist+budd+bs+geo+civic+music+art+dance+it+media+agri)/9) AS avg FROM marks WHERE  st_id IN (SELECT st_id FROM student WHERE username='$user')";
                $result1 = mysqli_query($conn,$sql7);
                if(!$result1){
                    die("invalid quary".mysqli_error($conn));
                }
                while($row = mysqli_fetch_array($result1)){
            ?>
            <table  class="table table-dark table-striped-columns">
            <tr>
                <th>Year</th>
                <th>Grade</th>
                <th>Term</th>
                <th>Mathematics</th>
                <th>Science</th>
                <th>English</th>
                <th>Sinhala</th>
                <th>History</th>
                <th>Buddism</th>
                <th>Business Studies</th>
                <th>Geography</th>
                <th>Civic & So. Science</th>
                <th>Music</th>
                <th>Art</th>
                <th>Dancing</th>
                <th>IT</th>
                <th>Media</th>
                <th>Agriculture</th>
                <th>Total</th>
                <th>Avg.</th>
            </tr>
            <tr>
                <td><?php echo $row['year']?></td>
                <td><?php echo $row['grade']?></td> 
                <td><?php echo $row['term']?></td>
                <td><?php echo $row['maths']?></td> 
                <td><?php echo $row['sci']?></td>
                <td><?php echo $row['eng']?></td> 
                <td><?php echo $row['sinh']?></td>
                <td><?php echo $row['hist']?></td> 
                <td><?php echo $row['budd']?></td>
                <td><?php echo $row['bs']?></td> 
                <td><?php echo $row['geo']?></td>
                <td><?php echo $row['civic']?></td> 
                <td><?php echo $row['music']?></td>
                <td><?php echo $row['art']?></td> 
                <td><?php echo $row['dance']?></td> 
                <td><?php echo $row['it']?></td>
                <td><?php echo $row['media']?></td> 
                <td><?php echo $row['agri']?></td> 
                <td><?php echo $row['total']?></td>
                <td><?php echo $row['avg']?></td> 
            </tr>
            </table>
            <br><br><br>
            <?php }?>
            
        
        <!-- <table border="1" width="80%">
	<tr>
		<th>Mathematics</th>
		<th>Science</th>
		<th>English</th>
		<th>Sinhala</th>
		<th>IT</th>
		
	</tr>
	<tr>
		<td>85</td>
		<td>64</td>
		<td>72</td>
		<td>49</td>
		<td>100</td>
		
	</tr>

    <table> -->
        
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