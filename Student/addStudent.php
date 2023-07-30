<?php
$conn = mysqli_connect("localhost", "root", "", "university");
if (!$conn) {
    header("location: studentsignup.html");

}
$stdfname = $_POST['stdfname'];
$stdlname = $_POST['stdlname'];
$dob = $_POST['dob'];
$gen = $_POST['gen'];
$eno = $_POST['eno'];
$sem = $_POST['semester'];
$semail = $_POST['semail'];
$smbno = $_POST['smbno'];
$scourse = $_POST['coursename'];
$sbranch = $_POST['branchname'];
$fname = $_POST['fname'];
$femail = $_POST['femail'];
$fmbno = $_POST['fmbno'];
$mname = $_POST['mname'];
$memail = $_POST['memail'];
$mmbno = $_POST['mmbno'];
$pwd = $_POST['pwd'];
$cpwd = $_POST['cpwd'];


$sql = "INSERT INTO student_table(sfname,slname,dob,gen,eno,sem,course,branch,email,mno,fname,femail,fmno,mname,memail,mmno,pwd,cpwd) VALUES ('$stdfname','$stdlname','$dob','$gen','$eno',$sem,'$scourse','$sbranch','$semail','$smbno','$fname','$femail','$fmbno','$mname','$memail','$mmbno','$pwd','$cpwd')";
if (mysqli_query($conn, $sql)) {
    header("location: studentlogin.html");
}

?>