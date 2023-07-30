<?php
    $conn = mysqli_connect("localhost", "root", "", "university");

    if(!$conn)
    {
        header("location: adminlogin.html");
    }

    $coursename = $_POST["coursename"];
    $branchname = $_POST["branchname"];
    $semester = $_POST["semester"];
    $examname = $_POST["examname"];
    $examtype = $_POST["examtype"];
    $maxmarks = $_POST["maxmarks"];
    if(strlen($examname)!=0 && strlen($examtype)!=0){
        $sql = "INSERT INTO exam_table (coursename, branchname, sem, examname, examtype, maxmarks) VALUES ('".$coursename."','".$branchname."','".$semester."','".$examname."','".$examtype."','".$maxmarks."')";
        $sql1 = "SELECT courseid FROM course_table WHERE coursename = '$coursename'";
        $result1 = mysqli_query($conn, $sql1);
        $row1 = mysqli_fetch_assoc($result1);
        $sql2 = "SELECT * FROM subject_table WHERE coursename = '$coursename' and branchname = '$branchname' and semester = '$semester'";
        $result2 = mysqli_query($conn, $sql2);
        if($examname == "Mid Semester Examination"){
            $examid="MSE";
        }
        elseif($examname=="End Semester Examination"){
            $examid="ESE";
        }
        if($examtype == "Regular"){
            $etype="REG";
        }
        elseif($examtype=="Remedial"){
            $etype="REM";
        }
        $sql3 = "CREATE TABLE ".$row1['courseid']."_SEM_".$semester."_".$examid."_".$etype."(eno VARCHAR(12)";
        if (mysqli_num_rows($result2) > 0) {
            // output data of each row
            while($row2 = mysqli_fetch_assoc($result2)) {
                $sql3 = $sql3." , ".$row2["subjectabbr"]." INT(10)";
            }
        }
        $sql3 = $sql3.")";
        
        if (mysqli_query($conn, $sql) and mysqli_query($conn, $sql3)) {
            $alert1 = "<div class='alert alert-success alert-dismissible text-center' style='font-size: 18px;'><button type='button' class='btn-close' data-bs-dismiss='alert'></button><strong>Success!</strong> New Exam Succesfully Added.</div>";
            setcookie ("alert4", $alert1);
            header("location: adminaddexam.php");
        } 
        else {
            $error1 = "Error: " . $sql . "<br>" . mysqli_error($conn);
            $alert1 = "<div class='alert alert-danger alert-dismissible text-center'  style='font-size: 18px;'><button type='button' class='btn-close' data-bs-dismiss='alert'></button><strong>Error!</strong>Please Try Again!</div>";
            setcookie ("alert4", $alert1);
            header("location: adminaddexam.php");
        }
    }
    else{
        $alert1 = "<div class='alert alert-danger alert-dismissible text-center'  style='font-size: 18px;'><button type='button' class='btn-close' data-bs-dismiss='alert'></button><strong>Error!</strong> Empty Exam Name or Exam Type</div>";
        setcookie ("alert4", $alert1);
        header("location: adminaddexam.php"); 
    }
    
?>