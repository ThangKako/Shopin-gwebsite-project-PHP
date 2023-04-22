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
    <title>Đăng Nhập</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' media='screen' href='main.css'>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <style>
        body{
            overflow-x:hidden;
        }
    </style>
    <script src='main.js'></script>
</head>
<body>
    <div class="container-fluid my-5">
        <h2 class="text-center">Đăng nhập</h2>
        <div class="row d-flex alight-item-center justify-content-center mt-5">
            <div class="col-lg-12 col-xl-6">
                <form action="" method="post" enctype="multipart/form-data">
                    <div class="form-outline mb-4 w-50 m-auto" >
                        <label for="user_username" class="form-label">Tên</label>
                        <input type="text" id="user_username" class="form-control" placeholder="Tên" autocomplete="off" required="required" name="user_username">
                    </div>
                    <div class="form-outline mb-4 w-50 m-auto" >
                        <label for="user_password" class="form-label">Mật khẩu</label>
                        <input type="password" id="user_password" class="form-control" placeholder="Mật khẩu" autocomplete="off" required="required" name="user_password">
                    </div>
                    
                    <div class="text-center">
                        <input type="submit" value="Login" class="btn btn-outline-success py-2 px-3" name="user_login">
                        <p class="fw-bold mt-2 pt-1">Chưa có tài khoản?<a href="user_registration.php"> Đăng kí</a></p>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
<footer>
<footer id="contact">
  <div class="container ">
    <div class="row">
      <div class="col-md-3 col-sm-6">
        <h4>Về Chúng Tôi</h4>
        <p>Sứ mệnh của chúng tôi là cung cấp cho khách hàng trải nghiệm mua sắm tốt nhất có thể. Chúng tôi cung cấp nhiều lựa chọn sản phẩm chất lượng cao với giá cả cạnh tranh và chúng tôi cam kết cung cấp dịch vụ khách hàng xuất sắc.</p>
      </div>
      <div class="col-md-3 col-sm-6">
        <h4>Liên Hệ</h4>
        <ul>
          <li><i class="fa fa-phone"></i> 123-456-7890</li>
          <li><i class="fa fa-envelope"></i> info@example.com</li>
          <li><i class="fa fa-map-marker"></i> 123 Trần Thanh Ngọ, Kiến An, Hải Phòng</li>
        </ul>
      </div>
      <div class="col-md-3 col-sm-6">
        <h4>Dich Vụ Khách Hàng</h4>
        <ul>
          <li><a href="#">Tài Khoản</a></li>
          <li><a href="#">Lịch Sử Giao Dịch</a></li>
          <li><a href="#">Trở Lại</a></li>
          <li><a href="#">FAQ</a></li>
        </ul>
      </div>
      <div class="col-md-3 col-sm-6">
        <h4>Theo Dõi Chúng Tôi</h4>
        <ul class="social-icons">
          <li><a href="#"><i class="fa-brands fa-facebook"></i></i></a></li>
          <li><a href="#"><i class="fa-brands fa-twitter"></i></a></li>
          <li><a href="#"><i class="fa-brands fa-google-plus-g"></i></a></li>
          <li><a href="#"><i class="fa-brands fa-instagram"></i></a></li>
        </ul>
      </div>
    </div>
  </div>
  <div class="bg-body-tertiary p3 text-center"><p>Bài Làm Đồ Án - Designed by Hoàng Mạnh Thắng - 2023</p></div>
</footer>
</html>

<?php 
if(isset($_POST['user_login'])){
    $user_username=$_POST['user_username'];
    $user_password=$_POST['user_password'];
    $select_query="SELECT * FROM `user_table` WHERE username='$user_username'";
    $result=mysqli_query($con,$select_query);
    $row_count=mysqli_num_rows($result);
    $row_data=mysqli_fetch_assoc($result);
    $user_ip=getIPAddress();

    //Sản Phẩm Trong giỏ
    $select_query_cart="SELECT * FROM `cart_details` WHERE ip_address='$user_ip'";
    $select_cart=mysqli_query($con,$select_query_cart);
    $row_count_cart=mysqli_num_rows($select_cart);
    // Logic đăng nhập
    if($row_count>0){
        $_SESSION['username']=$user_username;
        if(password_verify($user_password,$row_data['password'])){
            //echo "<script>alert('Đăng nhập thành công')</script>";
            if($row_count==1 and $row_count_cart==0){
                $_SESSION['username']=$user_username;
                echo "<script>alert('Đăng nhập thành công')</script>";
                echo "<script>window.open('../index.php','_self')</script>";
            }else{
                $_SESSION['username']=$user_username;
                echo "<script>alert('Đăng nhập thành công, bạn có một vài món hàng yêu thích trong giỏ hàng')</script>";
                echo "<script>window.open('../index.php','_self')</script>";
            }
        }else{
            echo "<script>alert('Sai thông tin')</script>";
        }
    }else{
        echo "<script>alert('Sai thông tin')</script>";
    }
}
?>



<!-- ->