<?php
include 'connectDB.php';

    session_start();
    if(!isset($_SESSION['username'])){
        header('location: index.php');
    }
$status = "อยู่ในตะกร้า";
$userid = $_SESSION['username'];
$bookid = $_GET['id'];
$sql1 = "INSERT INTO cart (bookid, userid, status)
        VALUES ('$bookid', '$userid', '$status')
        ON DUPLICATE KEY UPDATE status = VALUES(status)";

    
$result1 = mysqli_query($conn, $sql1);

if ($result1) {
    if (mysqli_affected_rows($conn) > 0) {
        echo '<script> alert("เพิ่มหนังสือไปยังตะกร้าสำเร็จ");</script>';
    } else {
        echo '<script> alert("หนังสือนี้อยู่ในตะกร้าของคุณแล้ว");</script>';
    }
    echo '<script>window.location="homeReader.php";</script>';
} else {
    echo "Error: " . $sql1 . "<br>" . mysqli_error($conn);
    echo '<script> alert("ไม่สำเร็จ");</script>';
}
//echo $show;
mysqli_close($conn);

?>