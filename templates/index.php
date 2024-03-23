<?php
include 'connectDB.php';
session_start();
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>เข้าสู่ระบบ</title>

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css">
  <!-- Font Awesome CSS -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

</head>
<body>

<section class="vh-100" style="background-color: #1F416C;">
  <div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col col-xl-10">
        <div class="card" style="border-radius: 1rem;">
          <div class="row g-0">
            <div class="col-md-6 col-lg-5 d-none d-md-block">
              <img src="img/moonbackg.jpg"
                alt="login form" class="img-fluid" style="border-radius: 1rem 0 0 1rem;" />
            </div>
            <div class="col-md-6 col-lg-7 d-flex align-items-center">
              <div class="card-body p-4 p-lg-5 text-black">

                <form method="POST" action="login_check.php">

                  <div class="d-flex align-items-center mb-3 pb-1">
                    <i class="fas fa-cubes fa-2x me-3" style="color: #ff6219;"></i>
                    <span class="h1 fw-bold mb-0">Dobby E-book</span>
                  </div>

                  <h5 class="fw-normal mb-3 pb-3" style="letter-spacing: 1px;">เข้าสู่ระบบด้วยบัญชีของคุณ</h5>

                  <div class="form-outline mb-4">
                    <input type="text" id="username"  name="username" class="form-control form-control-lg" />
                    <label class="form-label" for="form2Example17">ชื่อผู้ใช้</label>
                  </div>

                  <div class="form-outline mb-4">
                    <input type="password" id="password" name="password" class="form-control form-control-lg" />
                    <label class="form-label" for="form2Example27">รหัสผ่าน</label>
                  </div>
                  
                  <div class="pt-1 mb-4">
                  
                    <!--button class="btn btn-dark btn-lg btn-block" type="submit">เข้าสู่ระบบ</!--button-->
                    <input type="submit" class="btn btn-dark btn-lg btn-block" value = "เข้าสู่ระบบ">
                    <?php
                    if(isset($_SESSION["Error"])){
                        echo $_SESSION["Error"];
                  }
                  ?>
                  </div>

                  <p class="mb-5 pb-lg-2" style="color: #393f81;">ยังไม่มีบัญชีใช่ไหม? <a href="regisSelectRole.php"
                      style="color: #393f81;">ลงทะเบียนที่นี่</a></p>
                </form>

              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

  <!-- Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"></script>
  
</body>
</html>
