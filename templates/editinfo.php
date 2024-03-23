<?php
include 'connectDB.php';

$id = $_GET['id'];
$sql1 = "SELECT * FROM user WHERE userid = '$id' ";

$sql2 = "SELECT * FROM publisher WHERE publisherid = '$id' ";

$result1 = mysqli_query($conn,$sql1);
$result2 = mysqli_query($conn,$sql2);

$row1 = mysqli_fetch_array($result1);
$row2 = mysqli_fetch_array($result2);


if($row1 > 0){
    $role = $row1['role'];
    if($role == 'นักอ่าน'){
      $show=header("location:er.php?id=" . $row1['userid']);
    }
    elseif($role == 'นักเขียน'){
      $show=header("location:ew.php?id=" . $row1['userid']);
    }
    else{
      
    }
}
elseif($row2 > 0){
    $role = $row2['role'];
    if($role == 'สำนักพิมพ์'){
      $show=header("location:ep.php?id=" . $row2['publisherid']);
    }
    else{
      
    }
}
else{}
echo $show;
?>
