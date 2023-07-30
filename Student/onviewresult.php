<?php
    $conn=mysqli_connect("localhost","root","","university");
    if(!$conn)
    {
        die("Connection failed ");

    }
    $eno = $_POST['eno'];
    $examname = $_POST['examname'];
    $examtype = $_POST['examtype'];
    $sql1="select * from student_table where eno=$eno";
    $result1=mysqli_query($conn,$sql1);
    $row1=mysqli_fetch_assoc($result1);
    $sql = "SELECT maxmarks FROM exam_table WHERE coursename = '".$row1['course']."' and branchname = '".$row1['branch']."' and sem = '".$row1['sem']."' and examname = '".$examname."' and examtype = '".$examtype."'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    $maxmarks = $row['maxmarks'];
    if(isset($maxmarks)){
        $sql2 = "SELECT courseid FROM course_table WHERE coursename = '".$row1['course']."'";
    $result2 = mysqli_query($conn, $sql2);
    $row2 = mysqli_fetch_assoc($result2);
    $sql3 = "SELECT * FROM subject_table WHERE coursename = '".$row1['course']."' and branchname = '".$row1['branch']."' and semester = '".$row1['sem']."' order by subjectid";
    $result3 = mysqli_query($conn, $sql3);
    $str1 = $row2['courseid']." SEM ".$row1['sem']." ".$examname."-".$examtype;
    if($examname == "Mid Semester Examination"){
        $examid="MSE";
    }
    elseif($examname =="End Semester Examination"){
        $examid="ESE";
    }
    if($examtype == "Regular"){
        $etype="REG";
    }
    elseif($examtype =="Remedial"){
        $etype="REM";
    }
    $tab = $row2['courseid']."_SEM_".$row1['sem']."_".$examid."_".$etype;
    $tab = strtolower($tab);
    $sql4="SELECT * FROM ".$tab." where eno=$eno";
    $result4=mysqli_query($conn,$sql4);
    $row4=mysqli_fetch_assoc($result4);
    echo "<style> table,tr,td,th{border: 1px solid lightgray;}td,th{padding: 5px;}</style>";
    echo "<table style='border-collapse: collapse; width: 60%; margin-left: 300px; margin-top: 50px;'>";
    echo "<tr style='background-color: crimson;'><td colspan='4'><img src='../Images/L22.png' style='height: 80px; margin-left: 250px; padding: 5px;'></td></tr>";
    echo "<tr style='text-align: left;'><th colspan='1'>Name</th><td colspan='3'>".$row1['sfname']." ".$row1['slname']."</td></tr>";
    echo "<tr style='text-align: left;'><th colspan='1'>Enrollment Number</th><td colspan='3'>".$row1['eno']."</td></tr>";
    echo "<tr style='text-align: left;'><th colspan='1'>Exam</th><td colspan='3'>".$str1."</td></tr>";
    echo "<tr style='text-align: left;'><th colspan='1'>Branch</th><td colspan='3'>".$row1['branch']."</td></tr>";
    echo "<tr><td colspan='4'></td></tr>";
    echo "<tr><th>Subject Code</th><th>Subject Name</th><th>Maximum Marks</th><th>Marks Obtained</th></tr>";
    $sum = 0;
    $tot = 0;
    $bcount = 0;
    $passmark = ((int)$maxmarks*40)/100;
    if (mysqli_num_rows($result3) > 0) {
        // output data of each row
        while($row3 = mysqli_fetch_assoc($result3)) {
            echo "<tr style='text-align: center;'><td>".$row3['subjectid']."</td><td>".$row3['subjectname']."</td><td>".$maxmarks."</td><td>".$row4[$row3['subjectabbr']]."</td></tr>";
            $sum = $sum + (int)$row4[$row3['subjectabbr']];
            $tot = $tot + (int)$maxmarks;
            if((int)$row4[$row3['subjectabbr']]<$passmark){
                $bcount + $bcount + 1 ;
            }
        }
      }
    
    echo "<tr><td colspan='4'></td></tr>";
    echo "<tr><th colspan='3' style='text-align: right;'>Total Maximum Marks</th><td colspan='1' style='text-align: center;'>".$tot."</td></tr>";
    echo "<tr><th colspan='3' style='text-align: right;'>Total Maximum Marks</th><td colspan='1' style='text-align: center;'>".$sum."</td></tr>";
    echo "<tr><th colspan='3' style='text-align: right;'>Total Current Sem Backlog</th><td colspan='1' style='text-align: center;'>".$bcount."</td></tr>";
    echo "<tr><td colspan='4'></td></tr>";
    if($bcount > 0){
        echo "<tr style='text-align: center;'><td colspan='4'><p style='color: firebrick;'>Sorry! You have <b>not cleared</b> this exam.</td></tr>";

    }
    else{
        echo "<tr style='text-align: center;'><td colspan='4'><p style='color: green;'>Congratulations! You have <b>passed</b> this exam.<p></td></tr>";
    }
    echo "<tr style='text-align: center;'><td colspan='4'><a href='studentviewresult.php'>Back</a></td></tr>";
    echo "</table>";
    }
    else{
        $error1 = "<div class='alert alert-danger alert-dismissible text-center'  style='font-size: 18px; margin-left: 300px;'><button type='button' class='btn-close' data-bs-dismiss='alert'></button><strong>Sorry!</strong> No data available.</div>";
        setcookie ("error1", $error1);
        header("location: studentviewresult.php"); 
    }
    

?>