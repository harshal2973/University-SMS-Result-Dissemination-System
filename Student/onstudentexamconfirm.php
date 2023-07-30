<?php
    $conn=mysqli_connect("localhost","root","","university");
    if(!$conn)
    {
        die("Connection failed ");

    }
    $eno=$_GET['eno'];
    $sql="select * from student_table where eno=$eno";
    $result=mysqli_query($conn,$sql);
    $row=mysqli_fetch_assoc($result);
    $sql1="select * from exam_table where coursename = '".$row['course']."' and branchname = '".$row['branch']."' and sem = '".$row['sem']."'";
    $result1=mysqli_query($conn,$sql1);
    $row1=mysqli_fetch_assoc($result1);
    $sql2 = "SELECT courseid FROM course_table WHERE coursename = '".$row['course']."'";
    $result2 = mysqli_query($conn, $sql2);
    $row2 = mysqli_fetch_assoc($result2);
    if($row1['examname'] == "Mid Semester Examination"){
        $examid="MSE";
    }
    elseif($$row1['examname']=="End Semester Examination"){
        $examid="ESE";
    }
    if($row1['examtype'] == "Regular"){
        $etype="REG";
    }
    elseif($row1['examtype']=="Remedial"){
        $etype="REM";
    }
    $tab = $row2['courseid']."_SEM_".$row1['sem']."_".$examid."_".$etype;
    $tab = strtolower($tab);
    $sql4 = "SELECT * FROM subject_table WHERE coursename = '".$row['course']."' and branchname = '".$row['branch']."' and semester = '".$row['sem']."'";
    $result4 = mysqli_query($conn, $sql4);
    $sql3 = "INSERT INTO ".$tab." (eno";
    $str1 = " ";
    if (mysqli_num_rows($result4) > 0) {
        // output data of each row
        while($row3 = mysqli_fetch_assoc($result4)) {
            $sql3 = $sql3.",".$row3["subjectabbr"];
            $str1 = $str1.",0";
        }
        
    }
    $sql3 = $sql3.") VALUES ('".$eno."'".$str1.")";
    
    if (mysqli_query($conn, $sql3)) {
        header("location: studentexamform.php");
    }
    else{
        header("location: studentexamform.php");
    }
?>