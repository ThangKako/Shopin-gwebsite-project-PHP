<?php 
include('../include/connect.php');
include('../function/common_funtion.php');
session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Welcome <?php echo $_SESSION['username']?></title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' media='screen' href='user.css'>
    <!-- boostrap CSS JS-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">

    <!-- fontawsome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/jquery.slick/1.6.0/slick.css" />
<script type="text/javascript" src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/jquery.slick/1.6.0/slick.min.js"></script>
<style>
    
  .logo{
    width: 5%;
    height: 5%;
}
.profile_img{
  width:100%;
  margin:auto;
  display:block;
  /*height:100%;*/
  object-fit:contain;
}
.edit_img{
  width:100px;
  height:100px;
  object-fit:contain;
}
</style>

</head>
<body>
    <div class="container-fluid p-1">
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container-fluid">
    <img src ="../img/products/Pin.png" alt="" class="logo">
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
      <li class="nav-item">
          <a class="nav-link" aria-current="page" href="../index.php">TRANG CHỦ</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#contact">LIÊN HỆ</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="../product.php">
            SẢN PHẨM
          </a>         
        </li>
        <?php
        if(!isset($_SESSION['username'])){
          echo "
          <li class='nav-item'>
          <a class='nav-link' href='./user_login.php'>ĐĂNG NHẬP</a>
          </li>";
        }else{
          echo "
          <li class='nav-item'>
          <a class='nav-link' href='./user_logout.php'>ĐĂNG XUẤT</a>
          </li>";
          echo "
          <li class='nav-item'>
          <a class='nav-link' href='#'> ".$_SESSION['username']."</a>
          </li>";
        }
        ?> 
        <li class="nav-item">
          <a class="nav-link" href="../cart.php"><i class="fa-sharp fa-solid fa-cart-shopping"></i><sup><?php cart_item(); ?></a>
        </li>
        
      </ul>
      <form class="d-flex" action="../search_product.php" method="get"><!--sử dụng data có sẵn trong url-->
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name="search_data">
        <input type="submit" value="Search" class="btn btn-outline-success" name="search_data_product">
      </form>
    </div>
  </div>
</nav>


<div class="container-fluid my-5">
<h2 class="text-center">Thông tin cá nhân</h2>
        <div class="row d-flex alight-item-center justify-content-center mt-5">
        <div class="col-md-2 p-0">
  <ul class="navbar-nav bg-light text-center">
    <li class="nav-item">
      <a class="nav-link" href="#">
        <h4 class="mb-0">Thông tin tài khoản</h4>
      </a>
    </li>
    <?php
    $username=$_SESSION['username'];
    $user_image="SELECT* FROM`user_table` WHERE username='$username'";
    $user_image=mysqli_query($con,$user_image);
    $row_image=mysqli_fetch_array($user_image);
    $user_image=$row_image['user_img'];
    echo "<li class='nav-item'>
    <a class='nav-link' href='#'>
      <img src='./user_imgs/$user_image' alt='Profile picture' class='profile_img'>
    </a>
  </li>"
        ?>
    <?php 
    $username=$_SESSION['username'];
    $user_profile="SELECT * FROM `user_table` WHERE username='$username'";
    $result_query_profile = mysqli_query($con, $user_profile);
    $row = mysqli_fetch_array($result_query_profile);
    $username = $row['username'];
    $useremail = ['user_email'];
    $user_address =['user_address'];
    $user_phone =['user_phone']
    
?>

    <li class="nav-item">
      <a class="nav-link" href="profile.php">Tài khoản </a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="profile.php?edit_account">Thay đổi thông tin</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="profile.php?my_order">Đơn hàng của tôi</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="profile.php?delete_account">Xóa tài khoản</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="user_logout.php">Đăng xuất</a>
    </li>
  </ul>
</div>
            <div class="col-md-10">
            
      <?php get_user_detail();
      if(isset($_GET['edit_account'])){
        include('edit_account.php');
      }
      if(isset($_GET['my_order'])){
        include('user_order.php');
      } 
      if(isset($_GET['delete_account'])){
        include('delete_acount.php');
      }?>
            </div>
        </div>
</div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
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