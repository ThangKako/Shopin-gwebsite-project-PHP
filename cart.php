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
  <title>Shopping Online PHP - Giỏ hàng</title>
  <meta name='viewport' content='width=device-width, initial-scale=1'>
  <link rel='stylesheet' type='text/css' media='screen' href='stlye.css'>
  <!-- boostrap CSS JS-->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">

  <!-- fontawsome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/jquery.slick/1.6.0/slick.css" />
  <script type="text/javascript" src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script type="text/javascript" src="https://cdn.jsdelivr.net/jquery.slick/1.6.0/slick.min.js"></script>
  <style>
    .cart_img {
      width: 50px;
      height: 50px;
      object-fit: contain;
    }
  </style>

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
        </div>
      </div>
    </nav>
    <?php
    cart()
    ?>

    <section id="page-header">

    </section>
    <div class="container">
      <div class="row">
        <form action="" method="post">
          <table class="table table-bordered text-center">

            <?php
            $get_ip_add = getIPAddress();
            $total_price = 0; //khởi tạo biến $total_price để tính tổng giá trị
            $cart_query = "SELECT * from `cart_details` where ip_address='$get_ip_add'"; //truy vấn CSDL để lấy thông tin giỏ hàng của người dùng dựa trên địa chỉ IP.
            $result = mysqli_query($con, $cart_query);
            $result_count = mysqli_num_rows($result);
            if ($result_count > 0) {
              echo "
                        <thead>
                        <th>Tên Sản Phẩm</th>
                        <th>Hình Ảnh</th>
                        <th >Số Lượng Mua</th>
                        <th> Trong Giỏ </th>
                        <th>Giá</th>
                        <th>Xóa</th>
                        <th colspan='2'>Quản Lí</th>
                    </thead>
                    <tbody>";
              while ($row = mysqli_fetch_array($result)) { //lặp lại từng sản phẩm trong giỏ hàng để hiển thị thông tin sản phẩm
                $product_id = $row['product_id'];
                $quantities = $row['quantity'];
                $select_products = "SELECT * from `products` where product_id='$product_id'";
                $result_products = mysqli_query($con, $select_products);
                while ($row_product_price = mysqli_fetch_array($result_products)) {
                  $product_price = array($row_product_price['product_price']);
                  $price_table = $row_product_price['product_price'];
                  $product_title = $row_product_price['product_title'];
                  $product_img1 = $row_product_price['product_img1'];
                  $product_values = array_sum($product_price);
                  $total_price += $product_values;
            ?>
                  <tr>
                    <td><?php echo $product_title ?></td>
                    <td><img src="./admin/product_img/<?php echo $product_img1 ?>" alt="" class="cart_img"></td>
                    <td><input type="number" name="quantity" value="<?php echo $quantity; ?>" min="1" data-product-id="<?php echo $product_id; ?>">
                    </td>
                    <?php
                    if (isset($_POST['update_cart'])) {
                      $quantities = $_POST['quantity'];
                      $update_cart = "UPDATE `cart_details` set quantity=$quantities where $product_id=product_id AND `ip_address` = '$get_ip_add'";
                      $result_products_quantity = mysqli_query($con, $update_cart);
                      $total_price = $total_price * $quantities;
                    }
                    ?>
                    <?php /*
                    if (isset($_POST['update_cart'])) {
                      $quantities = $_POST['quantity'];
                      if (is_array($quantities)) {
                        echo"  is an array";
                      } else {
                        echo" $quantities is not array";
                      }
                    }*/
                    ?>

                    <?php /*
                    $get_ip_add = getIPAddress();
                    if (isset($_POST['update_cart'])) {
                      $quantities = $_POST['quantity'];
                      
                      foreach ($quantities as $product_id ) {
                        $update_cart = "UPDATE `cart_details` SET `quantity` = $quantities WHERE `product_id` = $product_id AND `ip_address` = '$get_ip_add'";
                        $result_products_quantity = mysqli_query($con, $update_cart);
                        $total_price = $total_price * $quantities;
                      }
                    }*/
                    ?>
                    <?php /*
                    $get_ip_add = getIPAddress();
                    if (isset($_POST['update_cart'])) {
                      $quantities = $_POST['qty'];
                      $total_price = 0; // initialize total_price to 0
                      for ($i = 0; $i < count($quantities); $i++) {
                        $quantity = $quantities[$i];
                        $update_cart = "UPDATE `cart_details` SET quantity=$quantity WHERE ip_address='$get_ip_add'";
                        $result_products_quantity = mysqli_query($con, $update_cart);
                        $total_price += $quantity; // add the quantity to total_price
                      }
                    }*/
                    ?>

                    <td><?php echo $quantities ?></td>
                    <td><?php echo $price_table ?> đ</td>
                    <td><input type="checkbox" name="removeitem[]" value="<?php echo $product_id ?>">
                    </td>
                    <td>
                      <!--<button class="btn btn-outline-success mx-3">Làm mới</button> -->
                      <input type="submit" value="Làm mới" class="btn btn-outline-success mx-3" name="update_cart">
                      <!--<button class="btn btn-outline-danger ">Xoá</button>-->
                      <input type="submit" value="Xóa" class="btn btn-outline-danger mx-3" name="remove_cart">
                    </td>
                  </tr>
            <?php }
              }
            } else {
              echo "<h2 class='text-center text-danger'>Chưa có mục nào được thêm vào giỏ</h2>";
            }


            ?>
            </<tbody>
          </table>


          <div class="d-flex mb-5">
            <?php
            $get_ip_add = getIPAddress();
            $cart_query = "SELECT * from `cart_details` where ip_address='$get_ip_add'"; //truy vấn CSDL để lấy thông tin giỏ hàng của người dùng dựa trên địa chỉ IP.
            $result = mysqli_query($con, $cart_query);
            $result_count = mysqli_num_rows($result);
            if ($result_count > 0) {
              echo " <h4 class='px-3'>TỔNG GIÁ:$total_price</h4>
            <button class='btn btn-outline-success mx-3'><a href='product.php' class='text-success text-decoration-none'>Trở về</button>
            <button class='btn btn-outline-danger'><a href='./user/checkout.php' class='text-danger text-decoration-none'>Thanh toán</a></button>";
            } else {
              //btn btn-outline-danger mx-3
              
            }
            if (isset($_POST['continue_shopping'])) {
              echo "<script>window.open('index.php','_self')<?script>";
            }
            ?>
            <!--<h4 class="px-3">TỔNG GIÁ: <?php echo $total_price ?></h4>
            <a href="product.php"><button class="btn btn-outline-success mx-3">Trở lại</button></a>
            <a href="#"><button class="btn btn-outline-danger ">Thanh toán</button></a>-->
          </div>
      </div>
    </div>
    </form>

    <!-- xóa hàng-->
    <?php
    function remove_cart_item()
    {
      global $con;
      if (isset($_POST['remove_cart'])) {
        foreach ($_POST['removeitem'] as $product_id) {
          echo $product_id;
          $delete_query = "Delete from `cart_details` where product_id=$product_id";
          $run_delete = mysqli_query($con, $delete_query);
          if ($run_delete) {
            echo "<script>window.open('cart.php','_self')</script>";
          }
        }
      }
    }
    echo remove_cart_item()
    ?>
    <?php
    /*
    if (isset($_POST['update_cart'])) {
      foreach ($_POST['removeitem'] as $update_id) {
        $total_price = 0;
        $quantities = $_POST['quantity'];
        $update_cart = "UPDATE `cart_details` set quantity=$quantities where $update_id=product_id AND `ip_address` = '$get_ip_add";
        $result_quantity = mysqli_query($con, $update_cart);
        if ($result_quantity){
          echo 'đéo';
        }
        $total_price = $total_price * $quantities;
      }
    }*/
    ?>
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