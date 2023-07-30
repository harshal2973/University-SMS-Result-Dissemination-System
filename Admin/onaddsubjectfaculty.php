<?php
    $conn = mysqli_connect("localhost", "root", "", "university");

    if(!$conn)
    {
        header("location: adminlogin.html");
    }

    $coursename = $_POST["coursename"];
    $branchname = $_POST["branchname"];
    $semester = $_POST["semester"];
    $subjectname = $_POST["subjectname"];
    $facultyname = $_POST["facultyname"];
    if(strlen($facultyname)!=0 && strlen($subjectname)!=0){
        $sql = "INSERT INTO subject_faculty_table (coursename, branchname, semester, subjectname, facultyname) VALUES ('".$coursename."','".$branchname."','".$semester."','".$subjectname."','".$facultyname."')";
        if (mysqli_query($conn, $sql)) {
            $alert1 = "<div class='alert alert-success alert-dismissible text-center' style='font-size: 18px;'><button type='button' class='btn-close' data-bs-dismiss='alert'></button><strong>Success!</strong> New Subject Faculty Succesfully Added.</div>";
            setcookie ("alert5", $alert1);
            header("location: adminaddsubjectfaculty.php");
        } 
        else {
            $error1 = "Error: " . $sql . "<br>" . mysqli_error($conn);
            $alert1 = "<div class='alert alert-danger alert-dismissible text-center'  style='font-size: 18px;'><button type='button' class='btn-close' data-bs-dismiss='alert'></button><strong>Error!</strong>Please Try Again!</div>";
            setcookie ("alert5", $alert1);
            header("location: adminaddsubjectfaculty.php");
        }
    }
    else{
        $alert1 = "<div class='alert alert-danger alert-dismissible text-center'  style='font-size: 18px;'><button type='button' class='btn-close' data-bs-dismiss='alert'></button><strong>Error!</strong> Empty Subject or Faculty Name</div>";
        setcookie ("alert5", $alert1);
        header("location: adminaddsubjectfaculty.php"); 
    }
    
?>