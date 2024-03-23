<?php
include 'connectDB.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get the selected role from the form
    $role = $_POST['role'];

    // Handle the action based on the selected role
    if ($role === 'นักอ่าน') {
        // Redirect to the reader page
        header('Location: regisReader.php');
        exit(); // It's a good practice to include an exit() after a header redirect
    } elseif ($role === 'นักเขียน') {
        // Redirect to the writer page
        header('Location: regisWriter.php');
        exit();
    } elseif ($role === 'สำนักพิมพ์') {
        // Redirect to the publisher page
        header('Location: regisPublisher.php');
        exit();
    }
    // You can add more elseif conditions for other roles if needed
}
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

    <title>register</title>

</head>
<body>
<form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
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
                <h3 class="mb-5 text-uppercase">เลือกบทบาทที่จะลงทะเบียนผู้ใช้</h3>

                <div class="row">
                    <select class="browser-default custom-select" name="role">
                    <option value="นักอ่าน" selected>นักอ่าน</option>
                    <option value="นักเขียน">นักเขียน</option>
                    <option value="สำนักพิมพ์">สำนักพิมพ์</option>
                    </select>
                </div>

                <div class="d-flex justify-content-end pt-3">
                <button type="button" class="btn btn-danger" onclick="window.location.href='index.php'">ย้อนกลับ</button>
                <input type="submit" class="btn btn-warning btn-lg ms-2" value = "ต่อไป">
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