<?php
    $conn=mysqli_connect("localhost","root","","university");
    if(!$conn)
    {
        die("Connection failed ");
    
    }
    echo "<script>alert('Done2')</script>";
    $funame = $_GET['funame'];
    $etype = $_GET['etype'];
    $fsubject = $_GET['fsubject'];
    $ename = $_GET['ename'];
    $feno = $_GET['feno'];
    $teno = $_GET['teno'];
    $sql="select * from faculty_table where uname='$funame'";
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
    elseif($row1['examname']=="End Semester Examination"){
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
    $sql3 = "SELECT subjectabbr FROM subject_table WHERE subjectname = '".$row['fsubject']."' AND semester=".$row1['sem'];
    $result3 = mysqli_query($conn, $sql3);
    $row3 = mysqli_fetch_assoc($result3);
    $sql4 = "SELECT eno,".$row3['subjectabbr']." FROM ".$tab;
    $result4 = mysqli_query($conn, $sql3);
    echo "<table>";
    echo "<thead><tr><th>Enrollment No</th><th>Marks</th></tr></thead>";
    echo "<tbody>";
    if (mysqli_num_rows($result4) > 0) {
        // output data of each row
        while($row4 = mysqli_fetch_assoc($result4)) {
          if((int)$row4['eno'] >= (int)$feno and (int)$row4['eno']<=(int)$tno){
            echo "<tr><td>".$row4['eno']."</td><td><input type='number' id='".$row4['eno']."' name='".$row4['eno']."'></td></tr>";
          }
        }
      }
      echo "</tbody>";
      echo "</table>";

?>