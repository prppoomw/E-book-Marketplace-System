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


$sql1 = "UPDATE user SET 
        userid = '$username', 
        firstname = '$name', 
        lastname = '$surname', 
        email = '$email',
        password = '$password', 
        gender = '$gender',
        province = '$province', 
        district = '$district', 
        street = '$street', 
        zipcode = '$zipcode',
        role = '$role'
        WHERE userid = '$username'";

$sql2 = "UPDATE reader SET 
        userid = '$username', 
        creditcard = '$creditcard'
        WHERE userid = '$username'";

$result1 = mysqli_query($conn, $sql1);
$result2 = mysqli_query($conn, $sql2);

if($result1){
    echo '<script> alert("แก้ไขข้อมูลสำเร็จ");</script>';
    echo '<script>window.location="homeReader.php";</script>';
    //$show=header("location:login.php");
}
else{
    echo "Error:" . $sql . "<br>" . mysqli_error($conn);
    echo '<script> alert("แก้ไขข้อมูลไม่สำเร็จ");</script>';
    //$show=header("location:regisReader.php");
}
//echo $show;
mysqli_close($conn);
?>sqli_close($conn);
?>