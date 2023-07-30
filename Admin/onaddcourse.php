<?php
    $conn = mysqli_connect("localhost", "root", "", "university");

    if(!$conn)
    {
        header("location: adminlogin.html");
    }

    $courseid = $_POST["courseid"];
    $coursename = $_POST["coursename"];
    if(strlen($courseid)!=0 && strlen($coursename)!=0){
        $sql = "INSERT INTO course_table (courseid, coursename)VALUES ('".$courseid."','".$coursename."')";
        if (mysqli_query($conn, $sql)) {
            $alert1 = "<div class='alert alert-success alert-dismissible text-center' style='font-size: 18px;'><button type='button' class='btn-close' data-bs-dismiss='alert'></button><strong>Success!</strong> New Course Succesfully Added.</div>";
            setcookie ("alert1", $alert1);
            header("location: adminaddcourse.php");
        } 
        else {
            $error1 = "Error: " . $sql . "<br>" . mysqli_error($conn);
            $alert1 = "<div class='alert alert-danger alert-dismissible text-center'  style='font-size: 18px;'><button type='button' class='btn-close' data-bs-dismiss='alert'></button><strong>Error!</strong>bPlease Try Again!</div>";
            setcookie ("alert1", $alert1);
            header("location: adminaddcourse.php");
        }
    }
    else{
        $alert1 = "<div class='alert alert-danger alert-dismissible text-center'  style='font-size: 18px;'><button type='button' class='btn-close' data-bs-dismiss='alert'></button><strong>Error!</strong> Empty Course Id or Course Name</div>";
        setcookie ("alert1", $alert1);
        header("location: adminaddcourse.php"); 
    }
    
?>