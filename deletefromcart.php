<?php
include 'connectDB.php';
session_start();
    if(!isset($_SESSION['username'])){
        header('location: index.php');
    }
    $userid = $_SESSION['username'];
$id = $_GET['id'];
$sql1 = "DELETE FROM cart WHERE bookid = '$id'AND userid = '$userid' ";

    
$result1 = mysqli_query($conn, $sql1);

if($result1){
echo '<script> alert("ลบออกจากตะกร้าสำเร็จ");</script>';
echo '<script>window.location="cart.php";</script>';
//$show=header("location:login.php");
}
else{
echo "Error:" . $sql . "<br>" . mysqli_error($conn);
echo '<script> alert("ลบข้อมูลไม่สำเร็จ");</script>';
//$show=header("location:regisReader.php");
}
//echo $show;
mysqli_close($conn);
?>