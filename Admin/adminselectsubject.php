<?php
    $course = $_GET['course'];
    $branch = $_GET['branch'];
    $sem = $_GET['sem'];
    $conn=mysqli_connect("localhost","root","","university");
    $sql1="select * from subject_table where coursename = '$course' and branchname = '$branch'and semester='$sem'";
    $result1=mysqli_query($conn,$sql1);
    echo "<option>Select Subject</option>";
    while($row = mysqli_fetch_assoc($result1)) {
        echo "<option>".$row['subjectname']."</option>";
    }
    mysqli_close($conn);
?>