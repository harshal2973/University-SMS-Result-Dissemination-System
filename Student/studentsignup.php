<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Sign Up</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <style>
        .stdform{
            /*border-top: 10px solid crimson;*/
            border-bottom: 10px solid crimson;
            width: 40%;
            margin-bottom: 40px;
        }
        .ulogo{
            height: 120px;
            width: 40%;
            background-color: crimson;
            margin-top: 40px;
        }
        .ulogo img{
            height: 100px;
            margin-top: 10px;
        }
        .btnsubmit{
            background-color: crimson;
            border-color: crimson;
            color: white;
        }
        .btnsubmit:hover{
            background-color: crimson;
            border-color: crimson;
            color: white;
        }
    </style>
</head>
<body>
    <div class="container ulogo text-center">
        <img src="../Images/L21.png">
    </div>
    <div class="container stdform">
        <form method="post" action="addStudent.php">
            <div class="row">
                <div class="col text-center mb-1 mt-1">
                    <h2>STUDENT REGISTRATION</h2>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6">
                    <div class="form-floating mb-1 mt-1">
                        <input type="text" class="form-control" id="stdfname" placeholder="Enter First Name" name="stdfname">
                        <label for="email">First Name</label>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-floating mb-1 mt-1">
                        <input type="text" class="form-control" id="stdlname" placeholder="Enter Last Name" name="stdlname">
                        <label for="stdlname">Last Name</label>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6">
                    <div class="form-floating mb-1 mt-1">
                        <input type="date" class="form-control" id="dob" placeholder="Enter Date of Birth" name="dob">
                        <label for="email">Date of Birth</label>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-floating mb-1 mt-1">
                        <select class="form-select form-control" id="gen" name="gen">
                          <option>Male</option>
                          <option>Female</option>
                          <option>Others</option>
                        </select>
                        <label for="gen" class="form-label">Gender:</label>
                      </div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="form-floating mb-1 mt-1">
                        <input type="text" class="form-control" id="eno" placeholder="Enter Enrollment No" name="eno" maxlength="12">
                        <label for="eno">Enrollment Number</label>
                    </div>
                </div>
                <div class="col">
                    <div class="form-floating mb-2 mt-2">
                        <select class="form-select" id="semester" name="semester">
                            <option value="">Select Semester</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                            <option value="6">6</option>
                            <option value="7">7</option>
                            <option value="8">8</option>
                        </select>
                        <label for="semester" class="form-label">Semester:</label>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="form-floating mb-2 mt-2">
                        <select class="form-select" id="coursename" name="coursename" onchange="oncoursechange(this.value)">
                        <option value= "">Select Course</option>
                        <?php
                            $conn=mysqli_connect("localhost","root","","university");
                            $sql1="select * from course_table";
                            $result1=mysqli_query($conn,$sql1);
                            while($row = mysqli_fetch_assoc($result1)) {
                        ?>
                        <option><?php echo $row["coursename"]; ?></option>
                        <?php
                            }
                            mysqli_close($conn);
                        ?>
                        </select>
                        <label for="coursename" class="form-label">Course:</label>
                    </div>
                </div>
                <div class="col">
                    <div class="form-floating mb-2 mt-2">
                        <select class="form-select" id="branchname" name="branchname">
                            <option value="">Select Branch</option>
                        </select>
                        <label for="branchname" class="form-label">Select Branch</label>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6">
                    <div class="form-floating mb-1 mt-1">
                        <input type="text" class="form-control" id="semail" placeholder="Enter Email" name="semail">
                        <label for="semail">Email</label>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-floating mb-1 mt-1">
                        <input type="text" class="form-control" id="smbno" placeholder="Enter Mobile Number" name="smbno" maxlength="10" >
                        <label for="smbno">Mobile Number</label>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="form-floating mb-1 mt-1">
                        <input type="text" class="form-control" id="fname" placeholder="Enter Father's Name" name="fname">
                        <label for="fname">Father's Name</label>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6">
                    <div class="form-floating mb-1 mt-1">
                        <input type="text" class="form-control" id="femail" placeholder="Enter Email" name="femail">
                        <label for="femail">Father's Email</label>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-floating mb-1 mt-1">
                        <input type="text" class="form-control" id="fmbno" placeholder="Enter Mobile Number" name="fmbno" maxlength="10" >
                        <label for="fmbno">Father's Mobile Number</label>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="form-floating mb-1 mt-1">
                        <input type="text" class="form-control" id="mname" placeholder="Enter Mother's Name" name="mname">
                        <label for="mname">Mother's Name</label>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6">
                    <div class="form-floating mb-1 mt-1">
                        <input type="text" class="form-control" id="memail" placeholder="Enter Email" name="memail">
                        <label for="memail">Mother's Email</label>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-floating mb-1 mt-1">
                        <input type="text" class="form-control" id="mmbno" placeholder="Enter Mobile Number" name="mmbno" maxlength="10" >
                        <label for="mmbno">Mother's Mobile Number</label>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6">
                    <div class="form-floating mb-1 mt-1">
                        <input type="password" class="form-control" id="pwd" placeholder="Enter Password" name="pwd">
                        <label for="pwd">Password</label>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-floating mb-1 mt-1">
                        <input type="password" class="form-control" id="cpwd" placeholder="Enter Confirm Password" name="cpwd">
                        <label for="cpwd">Confirm Password</label>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="container text-center mb-1 mt-1">
                        <button type="submit" class="btn btnsubmit">Submit</button>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col text-center mb-1 mt-1">
                    <a href="studentlogin.html" style="text-decoration: none;">Already have an account?</a>
                </div>
            </div>
        </form>
    </div>
    <script>
        function oncoursechange(str) {
            var xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("branchname").innerHTML = this.responseText;
                }
            };
            xmlhttp.open("GET","studentselectbranch.php?course="+str,true);
            xmlhttp.send();
        }
    </script>   
</body>
</html>