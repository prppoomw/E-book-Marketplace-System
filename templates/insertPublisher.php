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

$sql1 = "INSERT INTO publisher(publisherid,publishername,ppassword,pprovince,pstreet,pdistrict,pzipcode,role)
        values('$pid','$pname','$ppassword','$province','$street','$district','$zipcode','$role');";
        
$result1 = mysqli_query($conn, $sql1);

if($result1){
    echo '<script> alert("ลงทะเบียนเสร็จสิ้น");</script>';
    echo '<script>window.location="index.php";</script>';
    //$show=header("location:login.php");
}
else{
    echo "Error:" . $sql . "<br>" . mysqli_error($conn);
    echo '<script> alert("ลงทะเบียนไม่สำเร็จ");</script>';
    //$show=header("location:regisReader.php");
}
//echo $show;
mysqli_close($conn);
?>