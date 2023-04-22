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

  </div>
  <section id="hero">
    <h4>Mua bán trang phục</h4>
    <h2>Ưu đãi giảm giá</h2>
    <h1>Mọi mặt hàng</h1>
    <p>Giảm giá tới 30% với thẻ thành viên </p>
    <button>Mua sắm ngay</button>
  </section>

  <section id="feature" class="section-p1">
    <div class="fe-box">
      <img src="img/features/f1.png" alt="">
      <h6>Miễn phí vận chuyển</h6>
    </div>
    <div class="fe-box">
      <img src="img/features/f2.png" alt="">
      <h6>Đặt hàng trực tuyến</h6>
    </div>
    <div class="fe-box">
      <img src="img/features/f3.png" alt="">
      <h6>Tiết kiệm chi phí</h6>
    </div>
    <div class="fe-box">
      <img src="img/features/f4.png" alt="">
      <h6>Khuyến mại không ngừng</h6>
    </div>
    <div class="fe-box">
      <img src="img/features/f5.png" alt="">
      <h6>Mua sắm vui vẻ</h6>
    </div>
    <div class="fe-box">
      <img src="img/features/f6.png" alt="">
      <h6>Hỗ trợ 24/7</h6>
    </div>

  </section>
  <div class="banner">
        <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-indicators">
              <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
              <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
              <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
              <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="3" aria-label="Slide 4"></button>
              <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="4" aria-label="Slide 5"></button>                
            </div>
            <div class="carousel-inner">
              <div class="carousel-item active">
                <img height="550px" src="./img/banner/b7.jpg" alt="...">
              </div>
              <div class="carousel-item">
                <img height="550px" src="./img/banner/b10.jpg" class="d-block w-100" alt="...">
              </div>
              <div class="carousel-item">
                <img  height="550px" src="./img/banner/b14.jpg" class="d-block w-100" alt="...">
              </div>
              <div class="carousel-item">
                <img  height="550px" src="./img/banner/b16.jpg" class="d-block w-100" alt="...">
              </div>
              <div class="carousel-item">
                <img  height="550px" src="./img/banner/b18.jpg" class="d-block w-100" alt="...">
              </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Next</span>
            </button>
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
    <div class="bg-body-tertiary p3 text-center">
      <p>Bài Làm Đồ Án - Designed by Hoàng Mạnh Thắng - 2023</p>
    </div>
  </footer>

</html>