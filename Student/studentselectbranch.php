<?php
    $course = $_GET['course'];
    $conn=mysqli_connect("localhost","root","","university");
    $sql1="select * from branch_table where coursename = '$course'";
    $result1=mysqli_query($conn,$sql1);
    echo "<option>Select Branch</option>";
    while($row = mysqli_fetch_assoc($result1)) {
        echo "<option>".$row['branchname']."</option>";
    }
    mysqli_close($conn);
?>