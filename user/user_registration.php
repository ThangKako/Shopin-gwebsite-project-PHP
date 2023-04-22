<?php 
include('../include/connect.php');
include('../function/common_funtion.php')
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Đăng kí</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' media='screen' href='main.css'>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    
    <script src='main.js'></script>
</head>
<body>
    <div class="container-fluid my-5">
        <h2 class="text-center">Đăng kí</h2>
        <div class="row d-flex alight-item-center justify-content-center">
            <div class="col-lg-12 col-xl-6">
                <form action="" method="post" enctype="multipart/form-data">
                    <div class="form-outline mb-4 w-50 m-auto" >
                        <label for="user_username" class="form-label">Tên</label>
                        <input type="text" id="user_username" class="form-control" placeholder="Tên" autocomplete="off" required="required" name="user_username">
                    </div>
                    <div class="form-outline mb-4 w-50 m-auto" >
                        <label for="user_email" class="form-label">Email</label>
                        <input type="email" id="user_email" class="form-control" placeholder="Email" autocomplete="off" required="required" name="user_email">
                    </div>
                    <div class="form-outline mb-4 w-50 m-auto" >
                        <label for="user_img" class="form-label">Ảnh</label>
                        <input type="file" id="user_img" class="form-control" required="required" name="user_img">
                    </div>
                    <div class="form-outline mb-4 w-50 m-auto" >
                        <label for="user_password" class="form-label">Mật khẩu</label>
                        <input type="password" id="user_password" class="form-control" placeholder="Mật khẩu" autocomplete="off" required="required" name="user_password">
                    </div>
                    <div class="form-outline mb-4 w-50 m-auto" >
                        <label for="conf_user_password" class="form-label">Nhập lại mật khẩu</label>
                        <input type="password" id="conf_user_password" class="form-control" placeholder="Nhâp lại mật khẩu" autocomplete="off" required="required" name="conf_user_password">
                    </div>
                    <div class="form-outline mb-4 w-50 m-auto" >
                        <label for="user_address" class="form-label">Địa chỉ</label>
                        <input type="text" id="user_address" class="form-control" placeholder="Địa chỉ" autocomplete="off" required="required" name="user_address">
                    </div>
                    <div class="form-outline mb-4 w-50 m-auto" >
                        <label for="user_contact" class="form-label">Số điện thoại</label>
                        <input type="text" id="user_contact" class="form-control" placeholder="Số điện thoại liên lạc" autocomplete="off" required="required" name="user_contact">
                    </div>
                    <div class="text-center">
                    <input type="submit" value="Đăng kí" class="btn btn-outline-success py-2 px-3" name="user_register">
                        <p class="fw-bold mt-2 pt-1">Đã có tài khoản?<a href="user_login.php"> Đăng nhập</a></p>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>

<?php
if(isset($_POST['user_register'])){
    $user_username=$_POST['user_username'];
    $user_email=$_POST['user_email'];
    $user_password=$_POST['user_password'];
    $hash_password=password_hash($user_password,PASSWORD_DEFAULT);
    $conf_user_password=$_POST['conf_user_password'];
    $user_address=$_POST['user_address'];
    $user_contact=$_POST['user_contact'];
    $user_img=$_FILES['user_img']['name'];
    $user_img_tmp=$_FILES['user_img']['tmp_name'];
    $user_ip=getIPAddress();

    //Chọn

    
    //Them User
    if($user_username=='' or $user_email=='' or $user_password=='' or $conf_user_password=='' or $user_address=='' or $user_contact=='' or $user_img==''){

        echo "<script>alert('Hãy điền đủ tất các thông tin')</script>";
        exit();
    }else{

        // select
        $select_query="SELECT * FROM `user_table` WHERE useremail='$user_email' OR phone='$user_contact'";
        $result=mysqli_query($con,$select_query);
        $rows_count=mysqli_num_rows($result);
        if($rows_count>0){
            echo"<script>alert('Email hoặc Số điện thoại đã được đăng kí bởi 1 tài khoản khác')</script>";
        }else if($user_password!=$conf_user_password){
            echo"<script>alert('Mật khẩu không khớp')</script>";
        }
        
        else{
            move_uploaded_file($user_img_tmp,"./user_imgs/$user_img" );
            $insert_query="INSERT INTO `user_table` (username,useremail,password,user_img,user_ip,user_address,phone) VALUES('$user_username','$user_email','$hash_password','$user_img',' $user_ip','$user_address','$user_contact')";
            $sql_execute=mysqli_query($con,$insert_query);
        }
        
        
    }
    }
?>