<?php
    $conn = mysqli_connect("localhost", "root", "", "university");

    if(!$conn)
    {
        header("location: adminlogin.html");
    }

    $uname = $_POST["uname"];
    $pwd = $_POST["pwd"];
    if(strlen($uname)!=0 && strlen($pwd)!=0)
    {
        $query = "SELECT pwd FROM admin_table WHERE uname = '$uname' ";
        $result=mysqli_query($conn,$query);
        $row = mysqli_fetch_assoc($result);
        if($row['pwd'] == $pwd)
        {
            echo"Login Successful";
            session_start();
            $_SESSION['auname'] = $uname;
            header("location:adminhome.php");
        }
        else
        {
            echo "Invalid Credentials";
        }
    }
    else
    {
    echo "Empty Username Password";
    }
?>