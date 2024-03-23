<?php
include 'connectDB.php';
session_start();
    if(!isset($_SESSION["publisherid"])){
        header('location: index.php');
    }

    $pid = $_SESSION['publisherid'];

    $sql1="SELECT * FROM writer WHERE publisherid = '$pid'";
    $stmt= mysqli_query($conn,$sql1);
    $row2=mysqli_fetch_array($stmt);


$bookid = $_POST['bookid'];
$bookname = $_POST['bookname'];
$filetype = $_POST['filetype'];
$price = $_POST['price'];
$shortdetail = $_POST['shortdetail'];
$category = $_POST['category'];
$length = $_POST['length'];
$releasedate = $_POST['releasedate'];
$publisherid = $row2['publisherid'];
$userid = $_POST['userid'];
$bookcover = $_POST['bookcovers'];

//อัพโหลดรูปภาพ
if (is_uploaded_file($_FILES['bookcover']['tmp_name'])) {
    $new_image_name = 'ebook_'.uniqid().".".pathinfo(basename($_FILES['bookcover']['name']), PATHINFO_EXTENSION);
    $image_upload_path = "./img/".$new_image_name;
    move_uploaded_file($_FILES['bookcover']['tmp_name'],$image_upload_path);
    } else {
    $new_image_name = "$bookcover";
    }



    $sql1 = "UPDATE ebook SET 
    bookid = '$bookid', 
    bookname = '$bookname', 
    bookcover = '$new_image_name', 
    filetype = '$filetype', 
    price = '$price', 
    shortdetail = '$shortdetail', 
    category = '$category', 
    lengths = '$length', 
    releasedate = '$releasedate', 
    publisherid = '$publisherid', 
    userid = '$userid'
    WHERE bookid = '$bookid'";

        
$result1 = mysqli_query($conn, $sql1);

if($result1){
    echo '<script> alert("แก้ไขรายการหนังสือสำเร็จ");</script>';
    echo '<script>window.location="homePublisher.php";</script>';
    //$show=header("location:login.php");
}
else{
    echo "Error:" . $sql . "<br>" . mysqli_error($conn);
    echo '<script> alert("แก้ไขรายการหนังสือไม่สำเร็จ");</script>';
    //$show=header("location:regisReader.php");
}
//echo $show;
mysqli_close($conn);
?>