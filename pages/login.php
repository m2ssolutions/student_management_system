<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <meta charset="utf-8">
        <title>SSMS Login</title>
        <link rel="stylesheet" href="../css/log.css">
        
    </head>
    <body>
        <nav class="navlist">
          <label class="logo"><img src="../img/home/logo.png" alt=""></label>
            <!-- <ul type="none">
                <li><a href="./index.php">Home</a></li>
                <li><a href="./about.php">About</a></li>
                <li><a href="./appli.php">Admission</a></li>
                <li><a href="http://">Contact Us</a></li>
              </ul> -->
        </nav>
        <div class="cont">
            <div class="center">
                <h1>Login</h1>
                <form action="../script/login_check.php" method="POST">

                    <!-- <div style="padding-left: 20px;">
                        <input type="radio" id="admin" name="role" value="ADMIN">
                        <label for="admin">ADMIN</label>
                        <input type="radio" id="student" name="role" value="STUDENT">
                        <label for="student">STUDENT</label>
                        <input type="radio" id="teacher" name="role" value="TEACHER">
                        <label for="teacher">TEACHER</label>
                    </div> -->

                    <div class="txt_field">
                        <input type="text" name="username" required>
                        <span></span>
                        <lable>Username</lable>
                    </div>
                    <div class="txt_field">
                        <input type="password" name="password" required>
                        <span></span>
                        <lable>Password</lable>
                    </div>
                     <input type="submit" value="Login">

                     <div class="error">
                        <h4>
                        <?php
                            error_reporting(0);
                            session_start();
                            session_destroy();
                            echo $_SESSION['loginMessage'];
                            

                        ?>
                        </h4>
                    </div>
                </form>
                
            </div>
        </div>
        
        <div class="footer">
            <p>Follow us on</p>
            <ul>
              <li><a href="https://www.facebook.com"><img src="../img/home/icons8-facebook-48.png" alt=""></a></li>
              <li><a href="https://www.youtube.com"><img src="../img/home/icons8-youtube-logo-48.png" alt=""></a></li>
            </ul>
            <p>©All Rights Reserved.</p>
        </div> 
        
    </body>
</html>