<?php
include 'connectDB.php';
session_start();

$username = $_POST['username'];
$password = $_POST['password'];

//$password=hash('sha512',$password);

/*$sql = "SELECT * FROM test WHERE password = '$password' AND username = '$username'";
$result=mysqli_query($conn,$sql1);
$row=mysqli_fetch_array($result);


if($row > 0){
    $_SESSION["us"] = $row['userid'];
    $_SESSION["pw"] = $row['password'];
    $_SESSION["em"] = $row['email'];
    $show=header("location:index.php");
}
else{
    $_SESSION['Error'] = "<p style='color: red;'>ชื่อผู้ใช้หรือรหัสผ่านไม่ถูกต้อง</p>";
    $show=header("location:login.php");
}
echo $show;*/

$sql1 = "SELECT * FROM user WHERE password = '$password' AND (userid = '$username' OR email = '$username')";

$sql2 = "SELECT * FROM publisher WHERE ppassword = '$password' AND ( publisherid = '$username' OR publishername = '$username')";

$result1 = mysqli_query($conn,$sql1);
$result2 = mysqli_query($conn,$sql2);

$row1 = mysqli_fetch_array($result1);
$row2 = mysqli_fetch_array($result2);


if($row1 > 0){
    $_SESSION["role"] = $row1['role'];
    $_SESSION["username"] = $row1['userid'];
    $role = $_SESSION["role"];
    if($role == 'นักอ่าน'){
        $show=header("location:homeReader.php");
    }
    elseif($role == 'นักเขียน'){
        $show=header("location:homeWriter.php");
    }
    else{
        $_SESSION['Error'] = "<p style='color: red;'>ชื่อผู้ใช้หรือรหัสผ่านไม่ถูกต้อง</p>";
        $show=header("location:index.php");
    }
}
elseif($row2 > 0){
    $_SESSION["role"] = $row2['role'];
    $_SESSION["publisherid"] = $row2['publisherid'];
    $_SESSION["publishername"] = $row2['publishername'];
    $role = $_SESSION["role"];
    if($role == 'สำนักพิมพ์'){
        $show=header("location:homePublisher.php");
    }
    else{
        $_SESSION['Error'] = "<p style='color: red;'>ชื่อผู้ใช้หรือรหัสผ่านไม่ถูกต้อง</p>";
        $show=header("location:index.php");
    }
}
else{
    $_SESSION['Error'] = "<p style='color: red;'>ชื่อผู้ใช้หรือรหัสผ่านไม่ถูกต้อง</p>";
    $show=header("location:index.php");
}
echo $show;
?>