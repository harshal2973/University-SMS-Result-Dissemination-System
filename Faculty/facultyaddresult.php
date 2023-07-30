<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Faculty Add Result</title>
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
        .btnsub{
            background-color: teal;
            color: white;
            width: 80%;
            height: 58px;
        }
        .btnsub:hover{
            background-color: teal;
            color: white;
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
            <a href="facultyhome.php">Profile</a>
            <a href="facultyaddresult.php" class="active">Add Result</a>
        </div>
        <div class="main" id="sidemain">
            <div class="container-fluid" style=" border:1px solid teal; width: 65%; margin-top: 30px; margin-left: 500px; padding: 0px; float:left;">
                    <p style="color: white; background-color: teal; font-weight: bold; text-align: center; font-size: 24px;">ADD RESULT</p>
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
                    $sql01 = "SELECT * FROM subject_faculty_table WHERE facultyname = '".$row['fname']." ".$row['lname']."' AND coursename = '".$row['course']."' AND branchname = '".$row['branch']."' AND semester = ".$row['sem'];
                    $result01 = mysqli_query($conn, $sql01);
                    
                ?>
                <form method="post" action="facultyaddresult2.php">
                <div class="row">
                        <div class="col-sm-4">
                            <div class="form-floating mb-2 mt-2">
                            <select class="form-select" id="examname" name="examname">
                                <option value="">Select Exam Name</option>
                                <option value="Mid Semester Examination">Mid Semester Examination</option>
                                <option value="End Semester Examination">End Semester Examination</option>
                            </select>
                                <label for="examname">Exam Name:</label>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-floating mb-2 mt-2">
                            <select class="form-select" id="examtype" name="examtype">
                                <option value="">Select Exam Type</option>
                                <option value="Regular">Regular</option>
                                <option value="Remedial">Remedial</option>
                            </select>
                                <label for="examname">Exam Type:</label>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-floating mb-2 mt-2">
                            <select class="form-select" id="fsubject" name="fsubject">
                                <option value="">Select Subject</option>
                                <?php 
                                if (mysqli_num_rows($result01) > 0) {
                                    // output data of each row
                                    while($row01 = mysqli_fetch_assoc($result01)) {
                                      echo "<option>".$row01['subjectname']."</option>";
                                    }
                                }
                               ?>
                            </select>
                                <label for="examname">Subject:</label>
                            </div>
                        </div>
                        
                    </div>
                
                <div class="row">
                    <div class="col-sm-5">
                        <div class="form-floating mb-2 mt-2">
                            <input type="text" class="form-control" id="feno" placeholder="Enter Eno" name="feno">
                            <label for="feno">From Enrollment No:</label>
                        </div>    
                    </div>
                    <div class="col-sm-5">
                        <div class="form-floating mb-2 mt-2">
                            <input type="text" class="form-control" id="teno" placeholder="Enter Eno" name="teno">
                            <label for="teno">To Enrollment No:</label>
                        </div>    
                    </div>
                    <div class="col-sm-2">
                        <div class="container text-center mb-2 mt-2">
                            <input type="submit" class="btn btnsub" name="btnsubmit" value="GO">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col" id='resultdata'></div>
                </div>
                </div>
                </form>
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
        function onclickgo(){
            alert("DONE");
            let  ename = document.getElementById['examname'].value;
            alert(ename);
            etype = document.getElementById['examtype'].value;
            fsubject  =document.getElementById['fsubject'].value;
            feno = document.getElementById['feno'].value;
            teno = document.getElementById['teno'].value;
            var xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById['resultdata'].innerHTML = this.responseText;
                }
            };
            xmlhttp.open("GET","onfacultyaddresult.php?funame="+<?php echo $funame;?>+"&ename="+ename+"&etype="+etype+"&fsubject="+fsubject+"&feno="+feno+"&teno="+teno,true);
            xmlhttp.send();
        }
    </script>
</body>
</html>