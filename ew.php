<?php
include 'connectDB.php';

$id = $_GET['id'];
$sql="SELECT * FROM user WHERE userid = '$id'";
$tmp= mysqli_query($conn,$sql);
$row=mysqli_fetch_array($tmp);

$sql="SELECT * FROM writer WHERE userid = '$id'";
$tmp1= mysqli_query($conn,$sql);
$row1=mysqli_fetch_array($tmp1);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css">
    <!-- Font Awesome CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

    <title>edit</title>

</head>
<body>
<form method = "POST" action = "udw.php">
<section class="h-100 " style="background-color: #1F416C;">
  <div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col">
        <div class="card card-registration my-4">
          <div class="row g-0">
            <div class="col-xl-6 d-none d-xl-block">
              <img src="img/moonbackg.jpg"
                alt="Sample photo" class="img-fluid"
                style="border-top-left-radius: .25rem; border-bottom-left-radius: .25rem;" />
            </div>
            <div class="col-xl-6">
              <div class="card-body p-md-5 text-black">
                <h3 class="mb-5 text-uppercase">แก้ไขข้อมูล (สำหรับนักเขียน)</h3>

                <div class="row">
                  <div class="col-md-6 mb-4">
                    <div class="form-outline">
                      <input type="text" id="form3Example1m" name = "firstname" class="form-control form-control-lg" value = "<?=$row['firstname']?>"/>
                      <label class="form-label" for="form3Example1m">ชื่อ</label>
                    </div>
                  </div>
                  <div class="col-md-6 mb-4">
                    <div class="form-outline">
                      <input type="text" id="form3Example1n" name = "lastname" class="form-control form-control-lg" value = "<?=$row['lastname']?>"/>
                      <label class="form-label" for="form3Example1n">นามสกุล</label>
                    </div>
                  </div>
                </div>

                <div class="row">
                  <div class="col-md-6 mb-4">
                    <div class="form-outline">
                      <input type="text" id="form3Example1m1" name = "username" class="form-control form-control-lg" readonly value = "<?=$row['userid']?>"/>
                      <label class="form-label" for="form3Example1m1">ชื่อบัญชีผู้ใช้</label>
                    </div>
                  </div>
                  <div class="col-md-6 mb-4">
                    <div class="form-outline">
                      <input type="password" id="form3Example1n1" name = "password" class="form-control form-control-lg" value = "<?=$row['password']?>"/>
                      <label class="form-label" for="form3Example1n1">รหัสผ่าน</label>
                    </div>
                  </div>
                </div>

                <div class="form-outline mb-4">
                  <input type="text" id="form3Example8" name = "email" class="form-control form-control-lg" value = "<?=$row['email']?>"/>
                  <label class="form-label" for="form3Example8">Email</label>
                </div>

                <div class="d-md-flex justify-content-start align-items-center mb-4 py-2">

                  <h6 class="mb-0 me-4">เพศ: </h6>

                  <div class="form-check form-check-inline mb-0 me-4">
                    <input class="form-check-input" type="radio" name="gender" id="femaleGender"
                      value="เพศหญิง" />
                    <label class="form-check-label" for="femaleGender">เพศหญิง</label>
                  </div>

                  <div class="form-check form-check-inline mb-0 me-4">
                    <input class="form-check-input" type="radio" name="gender" id="maleGender"
                      value="เพสชาย" />
                    <label class="form-check-label" for="maleGender">เพศชาย</label>
                  </div>

                  <div class="form-check form-check-inline mb-0">
                    <input class="form-check-input" type="radio" name="gender" id="otherGender"
                      value="อื่นๆ" checked/>
                    <label class="form-check-label" for="otherGender">อื่นๆ</label>
                  </div>

                </div>

                <div class="form-outline mb-4">
                  <input type="text" id="form3Example9" name = "province" class="form-control form-control-lg" value = "<?=$row['province']?>"/>
                  <label class="form-label" for="form3Example9">จังหวัด</label>
                </div>

                <div class="form-outline mb-4">
                  <input type="text" id="form3Example90" name = "district" class="form-control form-control-lg" value = "<?=$row['district']?>"/>
                  <label class="form-label" for="form3Example90">อำเภอ</label>
                </div>


                <div class="row">
                  <div class="col-md-6 mb-4">
                    <div class="form-outline">
                    <input type="text" id="form3Example99" name = "street" class="form-control form-control-lg" value = "<?=$row['street']?>"/>
                    <label class="form-label" for="form3Example99">ถนน</label>
                    </div>
                  </div>
                  <div class="col-md-6 mb-4">
                    <div class="form-outline">
                    <input type="text" id="form3Example97" name = "zipcode" class="form-control form-control-lg" value = "<?=$row['zipcode']?>"/>
                  <label class="form-label" for="form3Example97">รหัสไปรษณีย์</label>
                    </div>
                  </div>
                </div>

                <div class="row">
                  <div class="col-md-6 mb-4">
                    <div class="form-outline">
                    <input type="text" id="form3Example99" name = "publisherid" class="form-control form-control-lg" readonly value = "<?=$row1['publisherid']?>"/>
                    <label class="form-label" for="form3Example99">PublisherID</label>
                    </div>
                  </div>
                  <div class="col-md-6 mb-4">
                    <div class="form-outline">
                    <input type="text" id="form3Example97" name = "receivemethod" class="form-control form-control-lg" value = "<?=$row1['receivemethod']?>"/>
                  <label class="form-label" for="form3Example97">ช่องทางการรับเงิน</label>
                    </div>
                  </div>
                </div>

                <div class="d-flex justify-content-end pt-3">
                <button type="button" class="btn btn-danger" onclick="window.location.href='homeWriter.php'">ย้อนกลับ</button>
                  <input type="submit" class="btn btn-warning btn-lg ms-2" value = "แก้ไข">
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
<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>