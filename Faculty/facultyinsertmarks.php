<?php
    $conn=mysqli_connect("localhost","root","","university");
    if(!$conn)
    {
        die("Connection failed ");

    }
    $tab = $_POST['tab'];
    $sub = $_POST['sub'];
    $feno = $_POST['feno'];
    $maxmarks = $_POST['maxmarks'];
    $markid = 1;
    $eno = (int)$feno;
    $sql1 = "SELECT * FROM ".$tab." ORDER BY eno";
    $result1 = mysqli_query($conn, $sql1);
    $markid = "m";
    $id = 1;

    if (mysqli_num_rows($result1) > 0) {
        // output data of each row
        while($row1 = mysqli_fetch_assoc($result1)) {
          if($row1['eno'] == $eno)
          { 
            $mid = $markid.$id;
            $num = $_POST[$mid];
            if((int)$num < $maxmarks){
                $sql2 = "UPDATE ".$tab." SET ".$sub." = ".(int)$num." WHERE eno = ".(string)$eno;
                mysqli_query($conn, $sql2);
            }
            $eno = $eno + 1;
            $id = $id + 1;
          }
        }
      }
      header("location:facultyaddresult.php");
?>