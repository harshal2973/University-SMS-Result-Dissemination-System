<?php
    $conn = mysqli_connect("localhost", "root", "", "university");

    if(!$conn)
    {
        header("location: adminlogin.html");
    }

    $coursename = $_POST["coursename"];
    $branchid = $_POST["branchid"];
    $branchname = $_POST["branchname"];
    if(strlen($branchid)!=0 && strlen($branchname)!=0){
    $coursename = $_POST["coursename"];
        $sql = "INSERT INTO branch_table (coursename,branchid, branchname) VALUES ('".$coursename."','".$branchid."','".$branchname."')";
        if (mysqli_query($conn, $sql)) {
            $alert1 = "<div class='alert alert-success alert-dismissible text-center' style='font-size: 18px;'><button type='button' class='btn-close' data-bs-dismiss='alert'></button><strong>Success!</strong> New Branch Succesfully Added.</div>";
            setcookie ("alert1", $alert2);
            header("location: adminaddbranch.php");
        } 
        else {
            $error1 = "Error: " . $sql . "<br>" . mysqli_error($conn);
            $alert1 = "<div class='alert alert-danger alert-dismissible text-center'  style='font-size: 18px;'><button type='button' class='btn-close' data-bs-dismiss='alert'></button><strong>Error!</strong>bPlease Try Again!</div>";
            setcookie ("alert1", $alert2);
            header("location: adminaddbranch.php");
        }
    }
    else{
        $alert1 = "<div class='alert alert-danger alert-dismissible text-center'  style='font-size: 18px;'><button type='button' class='btn-close' data-bs-dismiss='alert'></button><strong>Error!</strong> Empty Branch Id or Branch Name</div>";
        setcookie ("alert1", $alert2);
        header("location: adminaddbranch.php"); 
    }
    
?>