<?php
include 'connectDB.php';

  $bookid = $_GET['id'];
  $sql="SELECT * FROM ebook WHERE bookid = '$bookid'";
  $tmp= mysqli_query($conn,$sql);
  $row=mysqli_fetch_array($tmp);


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
    <title>edit book</title>

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
                <li class="active" ><a href="homeWriter.php">หนังสือของคุณ</a></li>
                <li ><a href="addBookWriter.php">เพิ่มรายการหนังสือ</a></li>
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
                <div class="col-lg-4">
                    <nav class="header__menu">
                        <ul>
                            <li class="active"><a href="homeWriter.php">หนังสือของคุณ</a></li>
                            <li ><a href="addBookWriter.php">เพิ่มรายการหนังสือ</a></li>
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
<form method = "POST" action = "updatebook.php" enctype = "multipart/form-data">
<section class="h-100 " style="background-color: #DDDDDD;">
  <div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col">
        <div class="card card-registration my-4">
          <div class="row g-0">
            <div class="col-xl-12">
              <div class="card-body p-md-5 text-black">
                <h3 class="mb-5 text-uppercase">แก้ไขรายการหนังสือ</h3>

                <div class="row">
                  <div class="col-md-6 mb-4">
                    <div class="form-outline">
                      <input type="text" id="form3Example1m" name = "bookname" class="form-control form-control-lg" value = "<?=$row['bookname']?>"/>
                      <label class="form-label" for="form3Example1m">ชื่อหนังสือ</label>
                    </div>
                  </div>
                  <div class="col-md-6 mb-4">
                    <div class="form-outline">
                      <input type="text" id="form3Example1n" name = "bookid" class="form-control form-control-lg" readonly value = "<?=$row['bookid']?>"/>
                      <label class="form-label" for="form3Example1n">รหัสหนังสือ</label>
                    </div>
                  </div>
                </div>

                <div class="row">
                  <div class="col-md-6 mb-4">
                    <div class="form-outline">
                      <input type="text" id="form3Example1m" name = "filetype" class="form-control form-control-lg" value = "<?=$row['filetype']?>"/>
                      <label class="form-label" for="form3Example1m">ชนิดของไฟล์</label>
                    </div>
                  </div>
                  <div class="col-md-6 mb-4">
                    <div class="form-outline">
                      <input type="number" id="form3Example1n" name = "price" class="form-control form-control-lg" value = "<?=$row['price']?>"/>
                      <label class="form-label" for="form3Example1n">ราคา</label>
                    </div>
                  </div>
                </div>

                <div class="row">
                  <div class="col-md-6 mb-4">
                    <div class="form-outline">
                        <input type="text" id="form3Example9" name = "category" class="form-control form-control-lg" value = "<?=$row['category']?>"/>
                        <label class="form-label" for="form3Example9">หมวดหมู่</label>
                    </div>
                  </div>
                  <div class="col-md-6 mb-4">
                    <div class="form-outline">
                        <input type="number" id="form3Example90" name = "length" class="form-control form-control-lg" value = "<?=$row['lengths']?>"/>
                        <label class="form-label" for="form3Example90">จำนวนหน้า</label>
                    </div>
                  </div>
                </div>

                <div class="form-outline mb-4">
                  <input type="text" id="form3Example97" name = "shortdetail" class="form-control form-control-lg" value = "<?=$row['shortdetail']?>"/>
                  <label class="form-label" for="form3Example97">เนื้อเรื่องย่อ</label>
                </div>

                <div class="row">
                  <div class="col-md-6 mb-4">
                    <div class="form-outline">
                        <label class="form-label" for="form3Example97">วันที่:</label><br>
                        <input type="datetime-local" name="releasedate" id="myDateTime" value = "<?=$row['releasedate']?>">
                    </div>
                  </div>
                  <div class="col-md-6 mb-4">
                    <div class="form-outline">
                    <label class="form-label" for="form3Example97">รูปภาพปกหนังสือ:</label><br>
                    <input type="file" name="bookcover" >
                    <input type="hidden" id="form3Example9" name = "bookcovers" class="form-control form-control-lg" value = "<?=$row['bookcover']?>"/>
                    </div>
                  </div>
                </div>

                <div class="d-flex justify-content-end pt-3">
                  <button type="button" class="btn btn-danger" onclick="window.location.href='homeWriter.php'">ยกเลิก</button>
                  <input type="submit" class="btn btn-warning btn-lg ms-2" value = "อัพเดทรายการหนังสือ">
                </div>

              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
</form>
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