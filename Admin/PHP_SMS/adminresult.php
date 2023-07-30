<!DOCTYPE html>
<html>

<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Add Branch</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.2.3/animate.min.css">
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script type="text/javascript"
        src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.11.2/jquery-ui.min.js"></script>
    <script type="text/javascript"
        src="https:/cdnjs.cloudflare.com/ajax/libs/waypoints/2.0.3/waypoints.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/jquery.counterup/1.0/jquery.counterup.min.js"></script>
    <style>
        .header {
            height: 100px;
            width: 100%;
            background-color: chocolate;
            position: fixed;
            float: left;
        }

        .section {
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
            transition: all 0.3s ease-out;
        }

        .sidenav a {
            padding: 6px 8px 6px 16px;
            text-decoration: none;
            font-size: 24px;
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
            font-size: 28px;
            /* Increased text to enable scrolling */
            padding: 0px 10px;
            height: 100%;
            width: 100%;
            margin-left: 0px;
            padding-left: 0px;
        }

        .submain {
            width: 100%;
        }

        @media screen and (max-height: 450px) {
            .sidenav {
                padding-top: 15px;
            }

            .sidenav a {
                font-size: 18px;
            }
        }

        .counter {
            animation-duration: 1s;
            animation-delay: 0s;
        }

        .btnadd {
            background-color: chocolate;
            border-color: chocolate;
            color: white;
        }

        .btnadd:hover {
            background-color: chocolate;
            border-color: chocolate;
            color: white;
        }

        .addcourseform {
            font-size: 18px;
        }
    </style>
</head>

<body>
    <header>
        <div class="container-fluid header">
            <nav class="navbar navbar-expand-sm">
                <div class="container-fluid">
                    <div class="navbar-brand">
                        <a class="toggle" id="toggle" style="font-size: 30px; color: white; margin-left: 15px;"><i
                                class="fa fa-bars"></i></a>
                        <img src="../../Images/L22.png" class="navbar-brand" style="height: 80px; margin-left: 50px;">
                    </div>
                    <div class="d-flex" style="margin-right: 10px;">
                        <button class="btn bg-white" type="button" onclick="onlogout()">Log Out</button>
                    </div>
                </div>
            </nav>
        </div>
    </header>
    <?php


    use Twilio\Rest\Client;

    require __DIR__ . '/vendor/autoload.php';

    $startEnrollmentNo = $_POST['feno'];
    $lastEnrollmentNo=$_POST['teno'];    
    
    // echo $startEnrollmentNo;
    
    $conn = mysqli_connect("localhost", "root", "", "university");
    for($i=$startEnrollmentNo;$i<=$lastEnrollmentNo;$i++){
      
    
    $sql1 = 'select * from student_table inner join be_sem_6_mse_reg on be_sem_6_mse_reg.eno=student_table.eno
     where student_table.eno=' . $i;
    $result1 = mysqli_query($conn, $sql1);
    while ($row = mysqli_fetch_assoc($result1)) {
        $twilio_number = '+12543562400';
        $account_sid = 'AC9d52a120849a9970155bc8a121c07727';
        $auth_token = '93e440d946096e354854859db1e1ef7f';
        $IP= $row['IP'];
        $TOC= $row['TOC'];
        $IOT= $row['IOT'];
        $CCM= $row['CCM'];
        $CPDP= $row['CPDP'];
        $ASD= $row['ASD'];
 
        $total=$IP+ $TOC+$IOT+$CCM+ $CPDP+$ASD;
        $avg=$total/6;

        $client = new Client($account_sid, $auth_token);
        $client->messages->create(
            "+91" . $row['mno'],
            [
                'from' => $twilio_number,
                'body' =>
                "Result for:".$row['eno'] . " is \n" .
                " IP :" .  $IP. "\n" .
                " TOC :" .   $TOC . "\n" .
                " IOT :" . $IOT . "\n" .
                " CCM :" .  $CCM . "\n" .
                " CPDP :" .  $CPDP . "\n" .
                " ASD :" .  $ASD . "\n".
                "\n".
                "Total :". $total ."\n".
                "Average :". $avg ."\n"
            ]
        );

    }
}
    mysqli_close($conn);
    ?>
    <section class="section">
        <div class="container-fluid submain">
            <div class="container-fluid"
                style=" border:1px solid chocolate; width: 40%; margin-top: 50px; padding: 0px; margin-left: 0px auto;">
                <p
                    style="color: white; background-color: chocolate; font-weight: bold; text-align: center; font-size: 24px">
                    Result Sent!</p>
                <div class="container addcourseform">

                </div>
                <div class="row">
                    <div class="col text-center mb-2 mt-2">
                        <a href="../adminhome.php" style="text-decoration: none;">Back to Home Page</a>
                    </div>
    </section>

    <script>
        function onlogout() {
                window.location.assign("../adminlogout.php");
            }
    </script>
</body>

</html>