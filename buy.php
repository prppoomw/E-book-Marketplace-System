<?php
include 'connectDB.php';

    session_start();
    if(!isset($_SESSION['username'])){
        header('location: index.php');
    }
?>

<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Ogani Template">
    <meta name="keywords" content="Ogani, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>buy</title>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200;300;400;600;900&display=swap" rel="stylesheet">

      <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css">
    <!-- Font Awesome CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

    <!-- Css Styles -->
    <link rel="stylesheet" href="css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="css/elegant-icons.css" type="text/css">
    <link rel="stylesheet" href="css/nice-select.css" type="text/css">
    <link rel="stylesheet" href="css/jquery-ui.min.css" type="text/css">
    <link rel="stylesheet" href="css/owl.carousel.min.css" type="text/css">
    <link rel="stylesheet" href="css/slicknav.min.css" type="text/css">
    <link rel="stylesheet" href="css/style.css" type="text/css">
</head>

<body>
    <!-- Page Preloder -->
    <div id="preloder">
        <div class="loader"></div>
    </div>

    <!-- Humberger Begin -->
    <div class="humberger__menu__overlay"></div>
    <div class="humberger__menu__wrapper">
        <div class="humberger__menu__logo">
            <a href="#"><img src="img/logo.png" alt=""></a>
        </div>
        
        <nav class="humberger__menu__nav mobile-menu">
            <ul>
                <li ><a href="homeReader.php">หน้าแรก</a></li>
                <li><a href="shelf.php">ชั้นหนังสือ</a></li>
                <li><a href="cart.php">ตะกร้า</a></li>
                <li><a href="review.php">รีวิวหนังสือ</a></li>
            </ul>
        </nav>
    </div>
    <!-- Humberger End -->

    <!-- Header Section Begin -->
    <header class="header">
        <div class="header__top">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6">
                    </div>
                    <div class="col-lg-6">
                        <div class="header__top__right">
                        <?php
                                $username = $_SESSION['username'];
                                $sql1="SELECT * FROM user WHERE userid = '$username'";
                                $stmt= mysqli_query($conn,$sql1);
                                $row1=mysqli_fetch_array($stmt);
                        ?>
                            <div class="header__top__right__language">
                                <div><?=$row1['userid']?></div>
                                <span></span>
                                <ul>
                                    <li><a href="editinfo.php?id=<?=$row1['userid']?>">แก้ไขข้อมูล</a></li>
                                </ul>
                            </div>
                            <div class="header__top__right__auth">
                                <a href="logout.php"><i class="fa fa-user"></i> ออกจากระบบ</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="header__logo">
                        <a href="./index.html"><img src="img/logo.png" alt=""></a>
                    </div>
                </div>
                <div class="col-lg-8">
                    <nav class="header__menu">
                        <ul>
                        <li><a href="homeReader.php">หน้าแรก</a></li>
                        <li><a href="shelf.php">ชั้นหนังสือ</a></li>
                        <li><a href="cart.php">ตะกร้า</a></li>
                        <li><a href="review.php">รีวิวหนังสือ</a></li>
                        </ul>
                    </nav>
                </div>
            </div>
            <div class="humberger__open">
                <i class="fa fa-bars"></i>
            </div>
        </div>
    </header>
    <!-- Header Section End -->

    <!-- Breadcrumb Section Begin -->
    <section class="breadcrumb-section set-bg" data-setbg="img/moonbackg.jpg">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="breadcrumb__text">
                        <h2>Dobby E-book</h2>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->

    <!-- Checkout Section Begin -->
    <section class="checkout spad">
        <div class="container">
            <div class="checkout__form">
                        <div class="col-lg-12 col-md-6">
                            <div class="checkout__order">
                                <h4>Order ของคุณ</h4>
                                <div class="checkout__order__products">หนังสือ<span>ราคา</span></div>
                                <ul>
                                <?php
                                    $sql = "SELECT *
                                    FROM ebook
                                    INNER JOIN cart ON ebook.bookid = cart.bookid
                                    WHERE cart.userid = '$username'";
                                    $hand= mysqli_query($conn,$sql);

                                while($row=mysqli_fetch_array($hand)){
                                    $price = $row['price']; // Get the price from the row
                                    $prices[] = $price; // Add the price to the array
                                ?>
                                    <li><?=$row['bookname']?><span><?=$row['price']?> บาท</span></li>
                                    <?php    
                                    }
                                    ?>
                                </ul>
                                <div class="checkout__order__total">ทั้งหมด <span><?php echo empty($prices) ? 0 :array_sum($prices); ?> บาท</span></div>
                                <p>เลือกวิธีชำระเงิน</p>
                                <div class="checkout__input__checkbox">
                                    <label for="payment">
                                        บัตรเครดิต
                                        <input type="checkbox" id="payment" checked>
                                        <span class="checkmark"></span>
                                    </label>
                                </div>
                                <button type="button" class="site-btn"><a href="transaction.php" class="site-btn">ดำเนินการซื้อ</a></button>
                            </div>
                        </div>
                    </div>
            </div>
        </div>
    </section>
    <?php    
    mysqli_close($conn);
    ?>
    <!-- Checkout Section End -->


    <!-- Js Plugins -->
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.nice-select.min.js"></script>
    <script src="js/jquery-ui.min.js"></script>
    <script src="js/jquery.slicknav.js"></script>
    <script src="js/mixitup.min.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/main.js"></script>



</body>

</html>