<?php
$conn=mysqli_connect("localhost","root","","university");
if(!$conn)
{
    header("location: studentlogin.html");

}
$eno=$_POST['eno'];
$pwd=$_POST['pwd'];
if(strlen($eno)!=0 && strlen($pwd)!=0)
{
    $query="SELECT pwd from student_table WHERE eno=$eno";
    $result=mysqli_query($conn,$query);
    $row = mysqli_fetch_assoc($result);
    if($row['pwd'] == $pwd)
    {
        echo"Login Successful";
        session_start();
        $_SESSION['eno'] = $eno;
        header("location:studenthome.php");
    }
    else
    {
        echo"Invalid Credentials";
    }
}
else
{
    echo "Empty Username Password";
}

?>