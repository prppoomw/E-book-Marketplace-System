<?php
include 'connectDB.php';
session_start();
    if(!isset($_SESSION['username'])){
        header('location: index.php');
    }

    $username = $_SESSION['username'];
    $sql1="SELECT * FROM user WHERE userid = '$username'";
    $stmt= mysqli_query($conn,$sql1);
    $row1=mysqli_fetch_array($stmt);

    $sql1="SELECT * FROM writer WHERE userid = '$username'";
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
$userid = $row1['userid'];

//อัพโหลดรูปภาพ
if (is_uploaded_file($_FILES['bookcover']['tmp_name'])) {
    $new_image_name = 'ebook_'.uniqid().".".pathinfo(basename($_FILES['bookcover']['name']), PATHINFO_EXTENSION);
    $image_upload_path = "./img/".$new_image_name;
    move_uploaded_file($_FILES['bookcover']['tmp_name'],$image_upload_path);
    } else {
    $new_image_name = "";
    }



$sql1 = "INSERT INTO ebook(bookid,bookname,bookcover,filetype,price,shortdetail,category,lengths,releasedate,publisherid,userid)
        values('$bookid','$bookname','$new_image_name','$filetype','$price','$shortdetail','$category','$length','$releasedate','$publisherid','$userid')";
        
$result1 = mysqli_query($conn, $sql1);

if($result1){
    echo '<script> alert("เพิ่มรายการหนังสือสำเร็จ");</script>';
    echo '<script>window.location="homeWriter.php";</script>';
    //$show=header("location:login.php");
}
else{
    echo "Error:" . $sql . "<br>" . mysqli_error($conn);
    echo '<script> alert("เพิ่มรายการหนังสือไม่สำเร็จ");</script>';
    //$show=header("location:regisReader.php");
}
//echo $show;
mysqli_close($conn);
?>