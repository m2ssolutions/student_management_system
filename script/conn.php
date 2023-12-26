<?php
    $server="localhost";
    $user ="root";
    $password="";
    $db ="studentmanage";
    
    $conn = mysqli_connect($server,$user,$password,$db);
    
    if(!$conn){
        die("connection error");
    }

    
?>