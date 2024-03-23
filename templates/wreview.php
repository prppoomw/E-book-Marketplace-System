<?php
include 'connectDB.php';

    session_start();
    if(!isset($_SESSION['username'])){
        header('location: index.php');
    }

    $userid = $_SESSION['username'];
    $bookid = $_GET['bookid'];

    $rating = $_POST['rating'];
    $description = $_POST['description'];

    $dates = date('Y-m-d H:i:s');

    $status = "รีวิวแล้ว";

    $sql = "UPDATE review SET 
    bookid = '$bookid', 
    userid = '$userid', 
    rating = '$rating',
    des = '$description',
    datetime = '$dates',
    status = '$status' 
    WHERE bookid = '$bookid'AND userid = '$userid' ";

$result = mysqli_query($conn, $sql);

if($result){
    echo '<script> alert("รีวิวหนังสือสำเร็จ");</script>';
    echo '<script>window.location="review.php";</script>';
    //$show=header("location:login.php");
}
else{
    echo "Error:" . $sql . "<br>" . mysqli_error($conn);
    echo '<script> alert("ไม่สำเร็จ");</script>';
    //$show=header("location:regisReader.php");
}
//echo $show;
mysqli_close($conn);
?>