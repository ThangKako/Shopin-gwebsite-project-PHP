<?php
include('../include/connect.php');
include('../function/common_funtion.php')
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Admin</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' media='screen' href='style.css'>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <!-- font Awsome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src='main.js'></script>
    <style>
        body {
            overflow: scroll;
        }
    </style>
</head>

<body>
    <div class="container-fluid m-3">
        <h2 class="text-center mb-5">
            Đăng kí
        </h2>
        <div class="row d-flex justify-content-center ">

            <div class=" col-sm-6 col-xl-4">
                <form action="" method="post">
                    <div class="form-outline mb-4">
                        <label for="admin_email" class="form-label">Username</label>
                        <input type="type" id="admin_name" name="admin_name" placeholder="Nhập tên đăng nhập" required="required" class="form-control">
                    </div>
                    <div class="form-outline mb-4">
                        <label for="admin_email" class="form-label">Email</label>
                        <input type="type" id="admin_email" name="admin_email" placeholder="Nhập tên email" required="required" class="form-control">
                    </div>
                    <div class="form-outline mb-4">
                        <label for="admin_password" class="form-label">Mật Khẩu</label>
                        <input type="type" id="admin_password" name="admin_password" placeholder="Nhập mật khẩu" required="required" class="form-control">
                    </div>
                    <div class="form-outline mb-4">
                        <label for="confirm_password" class="form-label">Nhập Lại Mật Khẩu</label>
                        <input type="type" id="confirm_ad_password" name="confirm_ad_password" placeholder="Nhập lại mật khẩu" required="required" class="form-control">
                    </div>
                    <div>
                        <input type="submit" class="bg-success py-2 px-3 border-0 text-light" name="admin_registration" value="Đăng kí">
                        <p class="small fw-bold mt-2 pt-1">Đã có tài khoản?<a href="admin_login.php" class="link-danger">Đăng nhập</a></p>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>

</html>
<?php
if (isset($_POST['admin_registration'])) {
    $admin_name = $_POST['admin_name'];
    $admin_email = $_POST['admin_email'];
    $admin_password = $_POST['admin_password'];
    $hash_password = password_hash($admin_password, PASSWORD_DEFAULT);
    $confirm_ad_password = $_POST['confirm_ad_password'];


    //Chọn


    //Them User
    if ($admin_name == '' or $admin_email == '' or $admin_password == '' or $confirm_ad_password == '') {

        echo "<script>alert('Hãy điền đủ tất các thông tin')</script>";
        exit();
    } else {

        // select
        $select_query = "SELECT * FROM `admin_table` WHERE admin_email='$admin_email'";
        $result = mysqli_query($con, $select_query);
        $rows_count = mysqli_num_rows($result);
        if ($rows_count > 0) {
            echo "<script>alert('Email hoặc Số điện thoại đã được đăng kí bởi 1 tài khoản khác')</script>";
        } else if ($admin_password != $confirm_ad_password) {
            echo "<script>alert('Mật khẩu không khớp')</script>";
        } else {

            $insert_query = "INSERT INTO `admin_table` (admin_name,admin_email,admin_password) VALUES('$admin_name','$admin_email','$hash_password')";
            $sql_execute = mysqli_query($con, $insert_query);
            echo "<script>alert('Thêm tài khoản admin thành công')</script>";
        }
    }
}
?>