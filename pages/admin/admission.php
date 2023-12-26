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
    <title>Admissions</title>
    <link rel="stylesheet" href="../../css/admin.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
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
                <a class="active" href="admission.php">Admissions</a>
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
                <a href="subject.php">Add/View Subject</a>
            </li>
        </ul>
    </aside>
    
    <div class="cont">
        <h1>Admissions</h1>
        <form action="#" method="post">
        <table class="table">
            <tr>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Birthday</th>
                <th>Address</th>
                <th>Guardian Name</th>
                <th>Email</th>
                <th>Phone Number</th>
                <th></th>
            </tr>
            <?php
                include("../../script/conn.php");
                $sql5="select * from admission";
                $result = mysqli_query($conn,$sql5);
                if(!$result){
                    die("invalid quary".mysqli_error($conn));
                }
                while($row = mysqli_fetch_array($result)){
            ?>
            <tr>
                <td><?php echo $row['f_name']?></td>
                <td><?php echo $row['l_name']?></td>
                <td><?php echo $row['dob']?></td>
                <td><?php echo $row['address']?></td>
                <td><?php echo $row['gname']?></td>
                <td><input type="text" name="mail" id="" value="<?php echo $row['email']?>"></td>
                <td><?php echo $row['phone']?></td>
                <td>
                    <!-- <button type="submit" name="btn" >Send Mail</button> -->
                    <?php
                    echo"
                    <a class='btn btn-success' href='admission.php?admi_id={$row['id']}'>Send Mail</a>";
                    ?>
                </td>
                
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

<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require'phpmailer/src/Exception.php';
require'phpmailer/src/PHPMailer.php';
require'phpmailer/src/SMTP.php';

if($_GET['admi_id']){

    $admi_id=$_GET['admi_id'];
    $qry="SELECT email FROM admission WHERE id='$admi_id'";
    $re=mysqli_query($conn,$qry);
    $r1=mysqli_fetch_array($re);

    $mail = new PHPMailer(true);

    $mail ->isSMTP();
    $mail->Host ='smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username ='devinkatuwawala@gmail.com';    //MY gmail
    $mail->Password ='tmudqwknphmpdgir';   // My gmail app pwd
    $mail->SMTPSecure ='ssl';
    $mail->Port = 465;

    $mail->setFrom('devinkatuwawala@gmail.com');   //MY gmail
    $mail->addAddress($r1['email']);
    $mail->isHTML(true);

    $mail->Subject="Calling interview for RUH school";
    $mail->Body= "Congratulations!, Your child have been selected to the interview of RUH school which will be held on 22nd of December 2023 at 9a.m. Please bring with your id, birth certificates and marriage certificate and child's birth certificate. See you on there. Regards!";

    // $mail->Subject= $_POST["subject"];
    // $mail->Body= $_POST["message"];

    $mail->send();

    echo "
    <script>alert('sent successfully');
    document.location.href ='admission.php';
    </script>
    ";

}
// if(isset($_POST['btn'])){
//     $mail = new PHPMailer(true);

//     $mail ->isSMTP();
//     $mail->Host ='smtp.gmail.com';
//     $mail->SMTPAuth = true;
//     $mail->Username ='devinkatuwawala@gmail.com';    //MY gmail
//     $mail->Password ='tmudqwknphmpdgir';   // My gmail app pwd
//     $mail->SMTPSecure ='ssl';
//     $mail->Port = 465;

//     $mail->setFrom('devinkatuwawala@gmail.com');   //MY gmail
//     $mail->addAddress($_POST['mail']);
//     $mail->isHTML(true);

//     $mail->Subject="Calling interview for RUH school";
//     $mail->Body= "Congratulations!, Your child have been selected to the interview of RUH school which will be held on 22nd of December 2023 at 9a.m. Please bring with your id, birth certificates and marriage certificate and child's birth certificate. See you on there. Regards!";

//     // $mail->Subject= $_POST["subject"];
//     // $mail->Body= $_POST["message"];

//     $mail->send();

//     echo "
//     <script>alert('sent successfully');
//     document.location.href ='admission.php';
//     </script>
//     ";

// }

?>