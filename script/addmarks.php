<?php
include("conn.php");
if(isset($_POST['submit'])){
    $st_id=$_POST['st_id'];
    $year=$_POST['year'];
    $grade=$_POST['grade'];
    $term=$_POST['term'];
    $maths=$_POST['maths'];
    $sci=$_POST['sci'];
    $eng=$_POST['eng'];
    $sinh=$_POST['sinh'];
    $hist=$_POST['hist'];
    $budd=$_POST['budd'];
    $bs=$_POST['bs'];
    $geo=$_POST['geo'];
    $civic=$_POST['civic'];
    $music=$_POST['music'];
    $art=$_POST['art'];
    $dance=$_POST['dance'];
    $it=$_POST['it'];
    $media=$_POST['media'];
    $agri=$_POST['agri'];

    $qry="INSERT INTO `marks`(`st_id`, `year`, `grade`, `term`, `maths`, `sci`, `eng`, `sinh`, `hist`, `budd`, `bs`, `geo`, `civic`, `music`, `art`, `dance`, `it`, `media`, `agri`) VALUES 
    ('$st_id','$year','$grade','$term','$maths','$sci','$eng','$sinh','$hist','$budd','$bs','$geo','$civic','$music','$art','$dance','$it','$media','$agri')";
    $re=mysqli_query($conn,$qry);
    // header("location:");
    echo "
    <script>alert('Added successfully');
    document.location.href ='../pages/teacher/marks.php';
    </script>
    ";
}
mysqli_close($conn);
?>