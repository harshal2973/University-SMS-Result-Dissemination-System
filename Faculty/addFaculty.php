<?php
    $conn = mysqli_connect("localhost", "root", "", "university");

    if(!$conn)
    {
        header("location: facultysignup.html");
    }
    $f_fname = $_POST["fclfname"];
    $f_lname = $_POST["fcllname"];
    $f_dob = $_POST["dob"];
    $f_gen = $_POST["gen"];
    $f_email = $_POST["email"];
    $f_mno = $_POST["mbno"];
    $f_course = $_POST["coursename"];
    $f_branch = $_POST["branchname"];
    $f_uname = $_POST["fcluname"];
    $f_sem = $_POST["semester"];
    $f_pwd = $_POST["pwd"];
    $f_cpwd = $_POST["cpwd"];
    $query = "INSERT INTO faculty_table(fname, lname, dob, gen, email, mno, course, branch, uname, sem, pwd, cpwd) VALUES('$f_fname', '$f_lname', '$f_dob', '$f_gen', '$f_email', $f_mno, '$f_course', '$f_branch','$f_uname', $f_sem, '$f_pwd', '$f_cpwd')";
    if(mysqli_query($conn, $query))
    {
        header("location: facultylogin.html");
    }
?>