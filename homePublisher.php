<?php
include 'connectDB.php';

    session_start();
    if(!isset($_SESSION["publisherid"])){
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
    <title>HOME PAGE</title>

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

    <!-- Humberger Begin -->
    <div class="humberger__menu__overlay"></div>
    <div class="humberger__menu__wrapper">
        <div class="humberger__menu__logo">
            <a href="#"><img src="img/logo.png" alt=""></a>
        </div>
        
        <nav class="humberger__menu__nav mobile-menu">
            <ul>
                <li class="active"><a href="">หนังสือของคุณ</a></li>
                <li><a href="addBookPublisher.php">เพิ่มรายการหนังสือ</a></li>
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
                                $username = $_SESSION["publisherid"];
                                $sql1="SELECT * FROM publisher WHERE publisherid = '$username'";
                                $stmt= mysqli_query($conn,$sql1);
                                $row1=mysqli_fetch_array($stmt);
                        ?>
                            <div class="header__top__right__language">
                                <div><?=$row1['publishername']?></div>
                                <span></span>
                                <ul>
                                    <li><a href="editinfo.php?id=<?=$row1['publisherid']?>">แก้ไขข้อมูล</a></li>
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
                <div class="col-lg-4">
                    <nav class="header__menu">
                        <ul>
                            <li class="active"><a href="">หนังสือของคุณ</a></li>
                            <li><a href="addBookPublisher.php">เพิ่มรายการหนังสือ</a></li>
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

    <!-- Product Section Begin -->
    <section class="product spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-2 col-md-5">
                </div>
                    <div class="filter__item">
                        <div class="row">
                        <div class="section-title product__discount__title">
                            <h2>หนังสือของสำนักพิมพ์</h2>
                        </div>
                        </div>
                    </div>
                    <div class="row">
                    <?php
                    $id = $_SESSION['publisherid'];
                    $sql="SELECT * FROM ebook WHERE publisherid = '$id'";
                    $hand= mysqli_query($conn,$sql);
                    while($row=mysqli_fetch_array($hand)){
                    ?>

                        <div class="col-lg-4 col-md-6 col-sm-6">
                            <div class="product__item">
                                <div class="product__item__pic set-bg" data-setbg="img/<?=$row['bookcover']?>" >
                                <ul class="product__item__pic__hover">
                                        <li><a href="deletebookp.php?id=<?=$row['bookid']?>"><i class="fa fa-trash"></i></a></li>
                                    </ul>
                                </div>
                                <div class="product__item__text">
                                    <h6><a href="editBookPublisher.php?id=<?=$row['bookid']?>"><?=$row['bookname']?></a></h6>
                                    <h5><?=$row['price']?> บาท</h5>
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
    </section>
    <!-- Product Section End -->


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