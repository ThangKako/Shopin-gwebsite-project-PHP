<?php 
include('../include/connect.php');
include('../function/common_funtion.php');
@session_start();
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
            Đăng nhập
        </h2>
        <div class="row d-flex justify-content-center ">
            <div class=" col-sm-6 col-xl-5">
                <img src="../img/User/admin.png" alt="admin login" class="img-fluid">
            </div>
            <div class=" col-sm-6 col-xl-4">
                <form action="" method="post">
                    <div class="form-outline mb-4">
                        <label for="admin_name" class="form-label">Username</label>
                        <input type="type" id="admin_name" name="admin_name" placeholder="Nhập tên đăng nhập" required="required" class="form-control">
                    </div>

                    <div class="form-outline mb-4">
                        <label for="password" class="form-label">Mật Khẩu</label>
                        <input type="type" id="password" name="admin_password" placeholder="Nhập mật khẩu" required="required" class="form-control">
                    </div>

                    <div>
                        <input type="submit" class="bg-success py-2 px-3 border-0 text-light" name="admin_login" value="Đăng nhập">
                        <p class="small fw-bold mt-2 pt-1">Chưa có tài khoản?<a href="admin_registration.php" class="link-danger">Đăng kí</a></p>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>

</html>
<?php
if (isset($_POST['admin_login'])) {
    $admin_name=$_POST['admin_name'];
    $admin_password = $_POST['admin_password'];
    $select_query = "SELECT * FROM `admin_table` WHERE admin_name='$admin_name'";
    $result=mysqli_query($con,$select_query);
    $row_count=mysqli_num_rows($result);
    $row_data=mysqli_fetch_assoc($result);
    if($row_count>0){
        $_SESSION['admin_name']=$admin_name;
        if(password_verify($admin_password,$row_data['admin_password'])){
                echo "<script>alert('Đăng nhập thành công')</script>";
                echo "<script>window.open('index.php','_self')</script>";
            }
        }else{
            echo "<script>alert('Sai thông tin')</script>";
        }
    }
?>