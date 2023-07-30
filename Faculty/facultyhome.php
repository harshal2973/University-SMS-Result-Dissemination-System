<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Faculty Home</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
        .header{
            height: 100px;
            width: 100%;
            background-color: teal;
            position: fixed;
            float: left;
        }
        .section{
            float: left;
            margin-top: 100px;
            width: 100%;
            height: 100%;
        }
        .sidenav {
            height: 100%;
            float: left;
            width: 0px;
            position: fixed;
            z-index: 1;
            top: 100px;
            left: 0;
            background-color: gray;
            overflow-x: hidden;
            padding-top: 20px;
            transition:all 0.3s ease-out;
        }
        .sidenav a {
            padding: 6px 8px 6px 16px;
            text-decoration: none;
            font-size: 25px;
            color: black;
            display: block;
        }
        .sidenav a:hover {
            color: white;
        }
        .sidenav .active {
            color: white;
        }
        .main {
            font-size: 28px; /* Increased text to enable scrolling */
            padding: 0px 10px;
            height: 100%;
            width: 100%;
            margin-left: -200px;
        }
        @media screen and (max-height: 450px) {
            .sidenav {padding-top: 15px;}
            .sidenav a {font-size: 18px;}
        }
    </style>
</head>
<body>
    <?php 
        session_start();
        if(!isset($_SESSION['funame'])){
            header("location: facultylogin.html");
        } 
    ?>
    <header>
        <div class="container-fluid header">
            <nav class="navbar navbar-expand-sm">
                <div class="container-fluid">
                    <div class="navbar-brand">
                        <a  class="toggle" id="toggle" style="font-size: 30px; color: white; margin-left: 15px;"><i class="fa fa-bars"></i></a>
                        <img src="../Images/L22.png" class="navbar-brand" style="height: 80px; margin-left: 50px;">
                    </div>
                    <div class="d-flex" style="margin-right: 10px;">
                        <button class="btn bg-white" type="button" onclick="onlogout()">Log Out</button>
                    </div>
                </div>
            </nav>
        </div>
    </header>
    <section class="section">
        <div class="sidenav" id="sidebar">
            <a href="facultyhome.php" class="active">Profile</a>
            <a href="facultyaddresult.php">Add Result</a>
        </div>
        <div class="main" id="sidemain">
            <div class="container-fluid" style=" border:1px solid teal; width: 35%; margin-top: 30px; margin-left: 300px; padding: 0px; float:left;">
                    <p style="color: white; background-color: teal; font-weight: bold; text-align: center; font-size: 24px;">FACULTY DETAILS</p>
                <div class="container" style="font-family: 'Times New Roman'; font-size: 20px; margin-bottom: 15px;">
                <?php
                    $conn=mysqli_connect("localhost","root","","university");
                    if(!$conn)
                    {
                        die("Connection failed ");

                    }
                    // session_start();
                    $funame=$_SESSION['funame'];
                    $sql="select * from faculty_table where uname='$funame'";
                    $result=mysqli_query($conn,$sql);
                    $row=mysqli_fetch_assoc($result);
                    echo "<style> table,tr,td{border: 1px solid lightgray;}td{padding: 5px;}</style>";
                    echo "<table style='border-collapse: collapse; width: 100%;'>";
                    echo "<tr><td>Name</td><td>".$row['fname']." ".$row['lname']."</td></tr>";
                    echo "<tr><td>Date of Birth</td><td>".$row['dob']."</td></tr>";
                    echo "<tr><td>Gender</td><td>".$row['gen']."</td></tr>";
                    echo "<tr><td>Email</td><td>".$row['email']."</td></tr>";
                    echo "<tr><td>Mobile Number</td><td>".$row['mno']."</td></tr>";
                    echo "<tr><td>Username</td><td>".$row['uname']."</td></tr>";
                    echo "<tr><td>Course</td><td>".$row['course']."</td></tr>";
                    echo "<tr><td>Branch</td><td>".$row['branch']."</td></tr>";
                    echo "<tr><td>Semester</td><td>".$row['sem']."</td></tr>";
                    echo "</table>";
                ?>
                </div>
            </div>
        </div>
    </section>
    
    <script>
        var btn = document.getElementById('toggle');
        var btnst = true;
        btn.onclick = function() {
        if(btnst == true) {
            document.getElementById('sidebar').style.width = '200px';
            document.getElementById('sidemain').style.marginLeft = '0px';
            btnst = false;
        }else if(btnst == false) {
            document.getElementById('sidebar').style.width = '0px';
            document.getElementById('sidemain').style.marginLeft = '-200px';
            btnst = true;
        }
        }
        function onlogout() {
            window.location.assign("facultylogout.php");
        }
        
    </script>
</body>
</html>