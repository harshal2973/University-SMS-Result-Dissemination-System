<?php
    $conn = mysqli_connect("localhost", "root", "", "university");

    if(!$conn)
    {
        header("location: adminlogin.html");
    }

    $coursename = $_POST["coursename"];
    $branchname = $_POST["branchname"];
    $semester = $_POST["semester"];
    $subjectid = $_POST["subjectid"];
    $subjectname = $_POST["subjectname"];
    $subjectabbr  = $_POST["subjectabbr"];
    if(strlen($subjectid)!=0 && strlen($subjectname)!=0){
        $sql = "INSERT INTO subject_table (coursename, branchname, semester, subjectid, subjectname, subjectabbr) VALUES ('".$coursename."','".$branchname."','".$semester."','".$subjectid."','".$subjectname."','".$subjectabbr."')";
        if (mysqli_query($conn, $sql)) {
            $alert1 = "<div class='alert alert-success alert-dismissible text-center' style='font-size: 18px;'><button type='button' class='btn-close' data-bs-dismiss='alert'></button><strong>Success!</strong> New Subject Succesfully Added.</div>";
            setcookie ("alert3", $alert1);
            header("location: adminaddsubject.php");
        } 
        else {
            $error1 = "Error: " . $sql . "<br>" . mysqli_error($conn);
            $alert1 = "<div class='alert alert-danger alert-dismissible text-center'  style='font-size: 18px;'><button type='button' class='btn-close' data-bs-dismiss='alert'></button><strong>Error!</strong>bPlease Try Again!</div>";
            setcookie ("alert3", $alert1);
            header("location: adminaddsubject.php");
        }
    }
    else{
        $alert1 = "<div class='alert alert-danger alert-dismissible text-center'  style='font-size: 18px;'><button type='button' class='btn-close' data-bs-dismiss='alert'></button><strong>Error!</strong> Empty Subject Id or Subject Name</div>";
        setcookie ("alert3", $alert1);
        header("location: adminaddsubject.php"); 
    }
    
?>