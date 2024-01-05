<?php
include 'connectDB.php';



$role = "สำนักพิมพ์";

$pname = $_POST['publishername'];
$pid = $_POST['publisherid'];
$ppassword = $_POST['ppassword'];
$province = $_POST['pprovince'];
$district = $_POST['pdistrict'];
$street = $_POST['pstreet'];
$zipcode = $_POST['pzipcode'];

        
        $sql1 = "UPDATE publisher SET 
        publisherid = '$pid', 
        publishername = '$pname', 
        ppassword = '$ppassword', 
        pprovince = '$province', 
        pdistrict = '$district', 
        pstreet = '$street', 
        pzipcode = '$zipcode',
        role = '$role'
        WHERE publisherid = '$pid'";
    
            
    $result1 = mysqli_query($conn, $sql1);
    
    if($result1){
        echo '<script> alert("แก้ไขข้อมูลสำเร็จ");</script>';
        echo '<script>window.location="homePublisher.php";</script>';
        //$show=header("location:login.php");
    }
    else{
        echo "Error:" . $sql . "<br>" . mysqli_error($conn);
        echo '<script> alert("แก้ไขข้อมูลไม่สำเร็จ");</script>';
        //$show=header("location:regisReader.php");
    }
    //echo $show;
    mysqli_close($conn);
    ?>