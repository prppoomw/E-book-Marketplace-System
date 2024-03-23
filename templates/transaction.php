<?php
include 'connectDB.php';

    session_start();
    if(!isset($_SESSION['username'])){
        header('location: index.php');
    }
$userid = $_SESSION['username'];
$count = 0;
$status = "ซื้อแล้ว";
$stt = "ยังไม่ได้รีวิว";
$sql = "SELECT *
        FROM ebook
        INNER JOIN cart ON ebook.bookid = cart.bookid
        WHERE cart.userid = '$userid'";
        $hand= mysqli_query($conn,$sql);

        while($row=mysqli_fetch_array($hand)){
            $count++;
            $bid = $row['bookid'];
            $bidarray[] = $bid; 
            $price = $row['price']; 
            $prices[] = $price;

            $sql2 = "DELETE FROM cart WHERE bookid = '$bid' AND userid = '$userid'";
            $result2 = mysqli_query($conn, $sql2);

            $sql3 = "INSERT INTO shelf (bookid, userid, status)
                    VALUES ('$bid', '$userid', '$status')
                    ON DUPLICATE KEY UPDATE status = VALUES(status)";
            $result3 = mysqli_query($conn, $sql3);

            $sql4 = "INSERT INTO review(bookid, userid, status)
                    values('$bid','$userid', '$stt' )";
            $result4 = mysqli_query($conn, $sql4);
        }
$bookidsJson = json_encode($bidarray);
$tdetail = $count . 'เล่ม';

$ttprice = array_sum($prices);

$dt = date('Y-m-d H:i:s');

$sql1 = "INSERT INTO buy(userid, bookid, transactiondetail, totalprice, datetime)
        values('$userid', '$bookidsJson', '$tdetail', '$ttprice', '$dt')";
    
$result1 = mysqli_query($conn, $sql1);

if ($result1) {
    echo '<script> alert("ดำเนินการซื้อสำเร็จ");</script>';
    echo '<script>window.location="shelf.php";</script>';
} else {
    echo "Error: " . $sql1 . "<br>" . mysqli_error($conn);
    echo '<script> alert("ไม่สำเร็จ");</script>';
}
//echo $show;
mysqli_close($conn);

?>