<?php
include('include/connect.php');
include('function/common_funtion.php');
session_start();

?>
<!DOCTYPE html>
<html>

<head>
  <meta charset='utf-8'>
  <meta http-equiv='X-UA-Compatible' content='IE=edge'>
  <title>Shopping Online PHP</title>
  <meta name='viewport' content='width=device-width, initial-scale=1'>
  <link rel='stylesheet' type='text/css' media='screen' href='stlye.css'>
  <!-- boostrap CSS JS-->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">

  <!-- fontawsome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/jquery.slick/1.6.0/slick.css" />
  <script type="text/javascript" src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script type="text/javascript" src="https://cdn.jsdelivr.net/jquery.slick/1.6.0/slick.min.js"></script>


</head>

<body>
  <div class="container-fluid p-1">
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
      <div class="container-fluid">
        <img src="img/products/Pin.png" alt="" class="logo">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
              <a class="nav-link" aria-current="page" href="index.php">TRANG CHỦ</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#contact">LIÊN HỆ</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="product.php">
                SẢN PHẨM
              </a>
            </li>
            <?php
            if (!isset($_SESSION['username'])) {
              echo "
          <li class='nav-item'>
          <a class='nav-link' href='./user/user_login.php'>ĐĂNG NHẬP</a>
          </li>";
            } else {
              echo "
          <li class='nav-item'>
          <a class='nav-link' href='./user/user_logout.php'>ĐĂNG XUẤT</a>
          </li>";
              echo "
          <li class='nav-item'>
          <a class='nav-link' href='./user/profile.php'> " . $_SESSION['username'] . "</a>
          </li>";
            }
            ?>
            <li class="nav-item">
              <a class="nav-link" href="cart.php"><i class="fa-sharp fa-solid fa-cart-shopping"></i><sup><?php cart_item(); ?></a>
            </li>

          </ul>
          <form class="d-flex" action="search_product.php" method="get"><!--sử dụng data có sẵn trong url-->
            <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name="search_data">
            <input type="submit" value="Search" class="btn btn-outline-success" name="search_data_product">
          </form>
        </div>
      </div>
    </nav>
    <?php
    cart()
    ?>

    <section id="page-header">
      <h2>#stayhome</h2>
      <p>Mua sắm tại gia giảm giá đến 30%</p>
    </section>

    <!--Product and sidenav display -->
    <div class="row px-3 mb-5">
      <div class="col-md-10">
        <div class="row">
          <?php
          getproducts();
          get_unique_category();
          get_unique_brand();


          //$ip = getIPAddress();  
          //echo 'User Real IP Address - '.$ip; 
          ?>
        </div>
      </div>

      <div class="col-md-2 bg-light">
        <!--Nhãn Hàng Thương hiệu-->
        <ul class="navbar-nav me-auto text-center">
          <li class="nav-item ">
            <a href="#" class="nav-link">
              <h4>Thương Hiệu</h4>
            </a>
          </li>
          <?php
          getbrands();
          ?>

        </ul>
        <ul class="navbar-nav me-auto text-center">
          <li class="nav-item ">
            <a href="#" class="nav-link">
              <h4>Danh Mục</h4>
            </a>
          </li>
          <?php
          getcategory();
          ?>
        </ul>
      </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
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
        <div class="bg-body-tertiary p3 text-center">
          <p>Bài Làm Đồ Án - Designed by Hoàng Mạnh Thắng - 2023</p>
        </div>
      </footer>

</html>