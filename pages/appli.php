<?php
    include("../script/conn.php");
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UFT-8">
    <meta http-equiv="X-UA-Compatible" content="IE-edge">
    <meta name="viewport" content="width=device-wodth, initial-scale=1.0">
    <title>Application Form</title>

    <link rel="stylesheet" href="../css/app.css">
    <script src="https://kit.fontawesome.com/f10e1dd3e9.js" crossorigin="anonymous"></script>
</head>
<body>
<nav class="navlist">
          <label class="logo"><img src="../img/home/logo.png" alt=""></label>
            <ul type="none">
                <li><a href="./index.php">Home</a></li>
                <li><a href="./about.php">About</a></li>
                <li><a href="./appli.php">Admission</a></li>
                <li><a href="./contact.php">Contact Us</a></li>
                <li  ><a href="./login.php" class="btn btn-outline-success" target="_blank">Login</a></li>
              </ul>
        </nav>
    

        
    <div class="hero">
        
        <p>Application for 2023/24<br> Enrollment</p>
        <form action="#" method="POST">
            <div class="row">
                <div class="input-group">
                    <input type="text" id="fname" name="fname" required>
                    <label for="fname"><i class="fa-regular fa-user"></i>  First Name</label>
    
                </div>
                <div class="input-group">
                    <input type="text" id="lname" name="lname" required>
                    <label for="lname"><i class="fa-regular fa-user"></i>  Last Name</label>
    
                </div>


            </div>
            
            <div class="input-group">
                <input type="date" id="birthday" name="birthday" required>
                <label for="birthday"></label>

            </div>
            <div class="input-group">
                <textarea id="address" name="address" rows="3" coloms="20" required></textarea>
                <label for="adress"><i class="fa-solid fa-location-dot"></i>  Address</label>

            </div>
            <div class="input-group">
                    <input type="text" id="gname" name="gname" required>
                    <label for="gname"><i class="fa-regular fa-user"></i>  Guardian Name</label>
    
            </div>
            <div class="input-group">
                <input type="email" id="email" name="email" required>
                <label for="email"><i class="fa-regular fa-envelope"></i>  Email</label>

            </div><div class="input-group">
                <input type="text" id="number" name="number" required>
                <label for="number"><i class="fa-solid fa-phone"></i>  Phone Number</label>

            </div>
        
        <button type="submit" name="register">SUBMIT<i class="fa-regular fa-paper-plane"></i></button>
        
        
        
        </form>



    </div>
    <div class="footer">
    
        <p>Follow us on </p>
        <ul>
          <li><a href="https://www.facebook.com"><img src="../img/home/icons8-facebook-48.png" alt=""></a></li>
          <li><a href="https://www.youtube.com"><img src="../img/home/icons8-youtube-logo-48.png" alt=""></a></li>
        </ul>
        
        <p>©All Rights Reserved.</p>
    </div>

</body>
</html>

<?php
    if(isset($_POST['register'])){
        $fname = $_POST['fname'];
        $lname = $_POST['lname'];
        $birthday = $_POST['birthday'];
        $address = $_POST['address'];
        $gname = $_POST['gname'];
        $email = $_POST['email'];
        $number = $_POST['number'];

        $sql4= " INSERT INTO `admission`(`f_name`,`l_name`,`dob`,`address`,`gname`,`email`,`phone`) VALUES ('$fname','$lname','$birthday','$address','$gname','$email','$number') ";
        $data = mysqli_query($conn,$sql4);
        if($data){
            echo "data insert succecefullly";
        }
        else{
            echo"failed";
        }

    }

?>