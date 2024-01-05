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
    <title>bookdetail</title>

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



    <?php
    $bookid = $_GET['id'];
    $sql ="SELECT * FROM ebook WHERE bookid = '$bookid'";
    $hand= mysqli_query($conn,$sql);
    $row=mysqli_fetch_array($hand);

    $wid = $row['userid'];
    $sql2 = "SELECT * FROM user WHERE userid = '$wid' ";
    $hand2= mysqli_query($conn,$sql2);
    $row2=mysqli_fetch_array($hand2);

    $pid = $row['publisherid'];
    $sql3 = "SELECT * FROM publisher WHERE publisherid = '$pid' ";
    $hand3= mysqli_query($conn,$sql3);
    $row3=mysqli_fetch_array($hand3);

    $bid = $row['bookid'];
    $sql5="SELECT * FROM review WHERE bookid = '$bid' AND status = 'รีวิวแล้ว' ";
    $hand5= mysqli_query($conn,$sql5);
    $count = mysqli_num_rows($hand5);

    ?>



    <!-- Product Details Section Begin -->
    <section class="product-details spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6">
                    <div class="product__details__pic">
                        <div class="product__details__pic__item">
                            <img class="product__details__pic__item--large"
                                src="img/<?=$row['bookcover']?>" height="750"alt="">
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6">
                    <div class="product__details__text">
                        <h3><?=$row['bookname']?></h3>
                        <div class="product__details__price"><?=$row['price']?> บาท</div>
                        <a href="tocart.php?id=<?=$row['bookid']?>" class="primary-btn">เพิ่มไปยังตะกร้า</a>
                        <a href="toshelfsttny.php?id=<?=$row['bookid']?>" class="heart-icon"><span class="icon_heart_alt"></span></a>
                        <ul>
                            <li><b>นักเขียน</b> <span><?=$row2['firstname']?>  <?=$row2['lastname']?></span></li>
                            <li><b>สำนักพิมพ์</b> <span><?=$row3['publishername']?></span></li>
                            <li><b>หมวดหมู่</b> <span><?=$row['category']?></span></li>
                            <li><b>จำนวนหน้า</b> <span><?=$row['lengths']?></samp></span></li>
                            <li><b>วันจำหน่าย</b> <span><?=$row['releasedate']?></span></li>
                            <li><b>ประเภทไฟล์</b><span><?=$row['filetype']?></span></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="product__details__tab">
                        <ul class="nav nav-tabs" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" data-toggle="tab" href="#tabs-1" role="tab"
                                    aria-selected="true">เรื่องย่อ</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#tabs-3" role="tab"
                                    aria-selected="false">Reviews <span>(<?php echo $count; ?>)</span></a>
                            </li>
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane active" id="tabs-1" role="tabpanel">
                                <div class="product__details__tab__desc">
                                    <h6><?=$row['bookname']?></h6>
                                    <p><?=$row['shortdetail']?></p>
                                </div>
                            </div>
                            <div class="tab-pane" id="tabs-3" role="tabpanel">
                                <div class="product__details__tab__desc">

                                <?php
                                
                                while($row5=mysqli_fetch_array($hand5)){
                                ?>

                                <div class="media">
                                    <div class="media-body">
                                        <div class="reviews-members-header">
                                            <h6 class="mb-1"><?=$row5['userid']?> คะแนน <?=$row5['rating']?></h6>
                                            <p class="text-gray"><?=$row5['datetime']?></p>
                                        </div>
                                        <div class="reviews-members-body">
                                        <p><?=$row5['des']?> </p>
                                        </div>
                                    </div>
                                </div>
                                
                                <?php
                                }
                                mysqli_close($conn);
                                ?>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Product Details Section End -->


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