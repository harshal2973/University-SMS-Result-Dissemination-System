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
            width: 30%;
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
                                $funame=$_SESSION['funame'];
                                $etype = $_POST['examtype'];
                                $fsubject = $_POST['fsubject'];
                                $ename = $_POST['examname'];
                                $feno = $_POST['feno'];
                                $teno = $_POST['teno'];
                                $sql="select * from faculty_table where uname='$funame'";
                                $result=mysqli_query($conn,$sql);
                                $row=mysqli_fetch_assoc($result);
                                $sql1="select * from exam_table where coursename = '".$row['course']."' and branchname = '".$row['branch']."' and sem = '".$row['sem']."'";
                                $result1=mysqli_query($conn,$sql1);
                                $row1=mysqli_fetch_assoc($result1);
                                $sql2 = "SELECT courseid FROM course_table WHERE coursename = '".$row['course']."'";
                                $result2 = mysqli_query($conn, $sql2);
                                $row2 = mysqli_fetch_assoc($result2);
                                if($row1['examname'] == "Mid Semester Examination"){
                                    $examid="MSE";
                                }
                                elseif($row1['examname']=="End Semester Examination"){
                                    $examid="ESE";
                                }
                                if($row1['examtype'] == "Regular"){
                                    $etype="REG";
                                }
                                elseif($row1['examtype']=="Remedial"){
                                    $etype="REM";
                                }
                                $tab = $row2['courseid']."_SEM_".$row1['sem']."_".$examid."_".$etype;
                                $tab = strtolower($tab);
                                $sql3 = "SELECT subjectabbr FROM subject_table WHERE subjectname = '".$fsubject."' AND semester=".$row1['sem'];
                                $result3 = mysqli_query($conn, $sql3);
                                $row3 = mysqli_fetch_assoc($result3);
                                $sql4 = "SELECT eno,".$row3['subjectabbr']." FROM ".$tab." ORDER BY eno";
                                $result4 = mysqli_query($conn, $sql4);
                                $str = "facultyinsertmarks.php?tab=".$tab."&sub=".$row3['subjectabbr']."&feno=".$feno;                   
                ?>
                <form method="post" action="facultyinsertmarks.php">
                    <div class="row">
                        <div class="col">
                            <?php 
                                echo "<input type='hidden' name='tab' value='".$tab."'>";
                                echo "<input type='hidden' name='sub' value='".$row3['subjectabbr']."'>";
                                echo "<input type='hidden' name='feno' value='".$feno."'>";
                                echo "<input type='hidden' name='maxmarks' value='".$row1['maxmarks']."'>";
                                echo "<style> table,tr,td,th{border: 1px solid lightgray; text-align: center;}td{padding: 5px;}</style>";
                                echo "<table style='border-collapse: collapse; width: 100%;'>";
                                echo "<thead><tr><th>Enrollment No</th><th>Marks</th></tr></thead>";
                                echo "<tbody>";
                                if (mysqli_num_rows($result4) > 0) {
                                    $markid = "m";
                                    $id = 1;
                                    // output data of each row
                                    while($row4 = mysqli_fetch_assoc($result4)) {
                                      if((int)$row4['eno'] >= (int)$feno or (int)$row4['eno']<=(int)$teno){
                                        $mid = $markid.$id;
                                        echo "<tr><td>".$row4['eno']."</td><td><input type='text' id='".$mid."' name='".$mid."' maxlength='2' pattern='[0-9]{2}'</td></tr>";
                                        $id = $id + 1;
                                      }
                                    }
                                  }
                                  echo "</tbody>";
                                  echo "</table>";
                            ?>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="container text-center mb-2 mt-2">
                                <input type="submit" class="btn btnsub" name="btnsubmit" value="ADD">
                            </div>
                        </div>
                    </div>
                </form>
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