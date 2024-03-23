<?php
include 'connectDB.php';

$id = $_GET['id'];
$sql="SELECT * FROM publisher WHERE publisherid = '$id'";
$tmp= mysqli_query($conn,$sql);
$row=mysqli_fetch_array($tmp);

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
<form method = "POST" action = "udp.php">
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
                <h3 class="mb-5 text-uppercase">แก้ไขข้อมูล (สำหรับสำนักพิมพ์)</h3>

                <div class="row">
                  <div class="col-md-6 mb-4">
                    <div class="form-outline">
                      <input type="text" id="form3Example1m" name = "publishername" class="form-control form-control-lg" value = "<?=$row['publishername']?>"/>
                      <label class="form-label" for="form3Example1m">ชื่อสำนักพิมพ์</label>
                    </div>
                  </div>
                  <div class="col-md-6 mb-4">
                    <div class="form-outline">
                      <input type="text" id="form3Example1n" name = "publisherid" class="form-control form-control-lg" readonly value = "<?=$row['publisherid']?>"/>
                      <label class="form-label" for="form3Example1n">PublisherID</label>
                    </div>
                  </div>


                </div>

                <div class="form-outline mb-4">
                  <input type="password" id="form3Example11" name = "ppassword" class="form-control form-control-lg" value = "<?=$row['ppassword']?>"/>
                  <label class="form-label" for="form3Example9">รหัสผ่าน</label>
                </div>

                <div class="d-md-flex justify-content-start align-items-center mb-4 py-2">

                  <h6 class="mb-0 me-4">ที่ตั้ง: </h6>

                </div>

                

                <div class="form-outline mb-4">
                  <input type="text" id="form3Example9" name = "pprovince" class="form-control form-control-lg" value = "<?=$row['pprovince']?>"/>
                  <label class="form-label" for="form3Example9">จังหวัด</label>
                </div>

                <div class="form-outline mb-4">
                  <input type="text" id="form3Example90" name = "pdistrict" class="form-control form-control-lg" value = "<?=$row['pdistrict']?>"/>
                  <label class="form-label" for="form3Example90">อำเภอ</label>
                </div>

                <div class="row">
                  <div class="col-md-6 mb-4">
                    <div class="form-outline">
                    <input type="text" id="form3Example99" name = "pstreet" class="form-control form-control-lg" value = "<?=$row['pstreet']?>"/>
                    <label class="form-label" for="form3Example99">ถนน</label>
                    </div>
                  </div>
                  <div class="col-md-6 mb-4">
                    <div class="form-outline">
                    <input type="text" id="form3Example97" name = "pzipcode" class="form-control form-control-lg" value = "<?=$row['pzipcode']?>"/>
                  <label class="form-label" for="form3Example97">รหัสไปรษณีย์</label>
                    </div>
                  </div>
                </div>

                <div class="d-flex justify-content-end pt-3">
                  <button type="button" class="btn btn-danger" onclick="window.location.href='homePublisher.php'">ย้อนกลับ</button>
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