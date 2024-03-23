<?php
include 'connectDB.php';



$role = "นักอ่าน";

$name = $_POST['firstname'];
$surname = $_POST['lastname'];
$username = $_POST['username'];
$password = $_POST['password'];
$email = $_POST['email'];
$gender = $_POST['gender'];
$province = $_POST['province'];
$district = $_POST['district'];
$street = $_POST['street'];
$zipcode = $_POST['zipcode'];

$creditcard = $_POST['creditcard'];

$sql1 = "INSERT INTO user(userid,firstname,lastname,email,password,gender,province,street,district,zipcode,role)
        values('$username','$name','$surname','$email','$password','$gender','$province','$street','$district','$zipcode','$role');";
        
$sql2 = "INSERT INTO reader(userid,creditcard) values('$username','$creditcard');";

$result1 = mysqli_query($conn, $sql1);
$result2 = mysqli_query($conn, $sql2);

if($result1 && $result2){
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