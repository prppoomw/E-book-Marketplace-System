<?php
include 'connectDB.php';
$id = $_GET['id'];
$sql1 = "DELETE FROM ebook WHERE bookid = '$id'";

    
$result1 = mysqli_query($conn, $sql1);

if($result1){
echo '<script> alert("ลบข้อมูลสำเร็จ");</script>';
echo '<script>window.location="homePublisher.php";</script>';
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