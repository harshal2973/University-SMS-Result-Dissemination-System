<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Student List</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <style>
        .header{
            height: 100px;
            width: 100%;
            background-color: chocolate;
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
        .counter {
            animation-duration: 1s;
            animation-delay: 0s;
        }

    </style>
</head>
<body>
    <header>
        <div class="container-fluid header">
            <nav class="navbar navbar-expand-sm">
                <div class="container-fluid">
                    <div class="navbar-brand">
                        <a  class="toggle" id="toggle" style="font-size: 30px; color: white; margin-left: 15px;"><i class="fa fa-bars"></i></a>
                        <img src="../Images/L32.png" class="navbar-brand" style="height: 80px; margin-left: 50px;">
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
            <a href="adminhome.php">Dashboard</a>
            <a href="adminfacultylist.php">Faculty List</a>
            <a href="adminstudentlist.php">Student List</a>
        </div>
        <div class="main" id="sidemain">
            <div class="container-fluid" style=" border:1px solid chocolate; width: 77%; margin-top: 30px; margin-left: 280px; padding: 0px; float:left;">
                    <p style="color: white; background-color: chocolate; font-weight: bold; text-align: center; font-size: 24px;">STUDENT LIST</p>
                <div class="container text-center" style="font-family: 'Times New Roman'; font-size: 20px; margin-bottom: 15px;">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Sno</th>
                                <th>Enrollment Number</th>
                                <th>Student Name</th>
                                <th>Gender</th>
                                <th>Email</th>
                                <th>Mobile Number</th>
                                <th>Semester</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $conn=mysqli_connect("localhost","root","","university");
                                $sql="select * from student_table";
                                $result=mysqli_query($conn,$sql);
                                $count=1;
                                $row = mysqli_fetch_assoc($result);
                                while($count<=mysqli_num_rows($result)){
                                echo '<tr>';
                                echo '<td>'.$count.'</td>';
                                echo '<td>'.$row["eno"].'</td>';
                                echo '<td>'.$row["sfname"].' '.$row["slname"].'</td>';
                                echo '<td>'.$row["gen"].'</td>';
                                echo '<td>'.$row["email"].'</td>';
                                echo '<td>'.$row["mno"].'</td>';
                                echo '<td>'.$row["sem"].'</td>';
                                echo '</tr>';
                                $count = $count + 1;
                                }
                                ?>
                        </tbody>
                    </table>
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
            window.location.assign("adminlogout.php");
        }
    </script>
</body>
</html>