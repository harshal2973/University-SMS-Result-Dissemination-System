<?php
    $course = $_GET['course'];
    $branch = $_GET['branch'];
    $sem = $_GET['sem'];
    $conn=mysqli_connect("localhost","root","","university");
    $sql1="select * from faculty_table where course = '$course' and branch = '$branch'and sem='$sem'";
    $result1=mysqli_query($conn,$sql1);
    echo "<option>Select Faculty</option>";
    while($row = mysqli_fetch_assoc($result1)) {
        echo "<option>".$row['fname']." ".$row['lname']."</option>";
    }
    mysqli_close($conn);
?>